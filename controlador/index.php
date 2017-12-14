<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal':
		global $userSesion;
		if ($_POST['usuario'] <> '')
			$userSesion = new TUsuario($_POST['usuario']);
		
		if ($userSesion->getIdTipo() <> 1){
			$db = TBase::conectaDB();
			$pendientes = array();
			
			$rs = $db->query("select * from metodocobro where idEmpresa = ".$userSesion->getEmpresa());
			if ($rs->num_rows == 0)
				$pendientes['bandMetodosCobro'] = true;
			
			$rs = $db->query("select marca, direccion, telefono, externo, email, colonia, municipio, ciudad, estado, rfc from empresa a where a.idEmpresa = ".$userSesion->getEmpresa());	
			
			$band = false;
			foreach($rs->fetch_assoc() as $key => $valor)
				if ($valor == '')
					$band = true;
			
			$pendientes['bandEmpresa'] = $band;
				
			$rs = $db->query("select * from bazar where idEmpresa = ".$userSesion->getEmpresa());
			if ($rs->num_rows == 0)
				$pendientes['bandBazar'] = true;	
			
			
			require_once('librerias/openpay/Openpay.php');
			$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);
			if ($ini['openpay']['produccion'] == 'on')
				Openpay::setProductionMode(true);
				
			$empresa = new TEmpresa($userSesion->getEmpresa());
			
			if ($empresa->getIdPay() == '')
				$empresa->setIdPay();
				
			try{
				$cliente = $openpay->customers->get($empresa->getIdPay());
				$tarjetas = $cliente->cards->getList(array());
				
				if (count($tarjetas) == 0)
					$pendientes['bandTarjetas'] = true;
				else
					$pendientes['bandTarjetas'] = false;
			}catch(Exception $e){
				ErrorSistema("PAY: ".$e->getMessage());
				$pendientes['bandTarjetas'] = false;
			}
			$smarty->assign("pendientes", $pendientes);
			$band = true;
			foreach($pendientes as $pendiente){
				$band = !$pendiente?false:$band;
			}
			$smarty->assign("bandPendientes", $band);
			if (!isset($_post['movil']))
				$sql = "select * from bazar where idEmpresa = ".$userSesion->getEmpresa();
			else;
				$sql = "select * from bazar a join usuariobazar b using(idBazar) where idEmpresa = ".$userSesion->getEmpresa()." and idUsuario = ".$userSesion->getId()." and estado = 1";
			
			$rs = $db->query($sql);
			$datos = array();
			$suma = 0;
			while($row = $rs->fetch_assoc()){
				$rs2 = $db->query("select count(*) as total from producto a where a.visible = true and idBazar = ".$row['idBazar']);
				$row2 = $rs2->fetch_assoc();
				$row['productos'] = $row2['total'];
				
				$sql = "select *, sum(precio * cantidad * ((100 - c.descuento) / 100) * ((100 - b.descuento) / 100)) as total
				from venta b
					join movimiento c using(idVenta)
				where b.idBazar = ".$row['idBazar']." and b.idEstado = 2";
				
				$rs2 = $db->query($sql);
				$row2 = $rs2->fetch_assoc();
				
				$suma += $row2['total'];
				$row['total2'] = $row2['total'] == null?0:$row2['total'];
				$row['total'] = number_format($row2['total'], 2, '.', ',');
				$row['json'] = json_encode($row);
				
				array_push($datos, $row);
			}
			$smarty->assign("bazares", $datos);
			$smarty->assign("totalBazares", number_format($suma, 2, '.', ','));
			
			$smarty->assign("json", array(
				"bazares" => $datos,
				"totalBazares" => number_format($suma, 2, '.', ','),
				"bandPendientes" => $band,
				"pendientes" => $pendientes,
				"usuario" => array(
					"nombre" => $userSesion->getNombre(),
					"nombrePerfil" => $userSesion->getTipo(),
					"idPerfil" => $userSesion->getPerfil(),
					"idUsuario" => $userSesion->getId()
				),
				"empresa" => array("logotipo" => file_exists("repositorio/empresas/empresa".$userSesion->getEmpresa().".jpg")?"repositorio/empresas/empresa".$userSesion->getEmpresa().".jpg":"img/logo.png"
				)
			));
		}
	break;
	case 'interfaz':
		$db = TBase::conectaDB();
		
		$sql = "select idEmpresa from empresa where visible = 1 and activo = 1 and (ultimocorte < now() or ultimocorte is null)";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		while($rowEmpresa = $rs->fetch_assoc()){
			$empresa = new TEmpresa($rowEmpresa['idEmpresa']);
			
			#$sql = "select idVenta, descuento from venta a join bazar b using(idBazar) where fecha between '".$empresa->getUltimoCorte()."' and date_sub(NOW(), INTERVAL 1 DAY) and idEmpresa = ".$empresa->getId();
			$sql = "select idVenta, descuento from venta a join bazar b using(idBazar) where (registro is null or registro = '') and NOW() and idEmpresa = ".$empresa->getId()." and idEstado = 2";
			$rsVentas = $db->query($sql) or errorMySQL($db, $sql);
			$suma = 0;
			while($rowVenta = $rsVentas->fetch_assoc()){
				$sql = "select sum(cantidad * precio * (1 - descuento / 100)) as ventas from movimiento where idVenta = ".$rowVenta['idVenta'];
				$rsDet = $db->query($sql) or errorMySQL($db, $sql);
				$row = $rsDet->fetch_assoc();
				$total = $row['ventas'];
				$total = $total == ''?0:$total;
				
				$total -= $total * ($rowVenta['descuento'] / 100);
				
				$suma += $total;
			}
			
			if ($suma > 0){
				$comision =  new TComision;
				$comision->setEmpresa($empresa->getId());
				$comision->setInicio($empresa->getUltimoCorte());
				$comision->setFin(date("Y-m-d"));
				$comision->setComision($empresa->getComision());
				$comision->setMonto($suma);
				
				if ($comision->guardar()){
					$empresa->setUltimoCorte();
					$empresa->guardar();
					
					$sql = "update venta a join bazar b using(idBazar) set registro = now() where idEmpresa = ".$empresa->getId()." and idEstado = 2";
					$db->query($sql) or errorMySQL($db, $sql);
				}
			}
		}
	break;
}
?>