<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal':
		global $userSesion;
		if ($userSesion->getIdTipo() <> 1){
			$db = TBase::conectaDB();
			$pendientes = array();
			
			$rs = $db->query("select * from metodocobro where idEmpresa = ".$userSesion->getEmpresa());
			if ($rs->num_rows == 0)
				$pendientes['bandMetodosCobro'] = true;
			
			$empresa = new TEmpresa($userSesion->getEmpresa());
			if ($empresa->getSlogan() == '' or $empresa->getMarca() == '' or $empresa->getDireccion() == '')
				$pendientes['bandEmpresa'] = true;
				
			$rs = $db->query("select * from bazar where idEmpresa = ".$userSesion->getEmpresa());
			if ($rs->num_rows == 0)
				$pendientes['bandBazar'] = true;
			
			$smarty->assign("pendientes", $pendientes);
			
			
			$sql = "select *, sum(precio * cantidad * ((100 - c.descuento) / 100) * ((100 - b.descuento) / 100)) as total
				from bazar a join venta b using(idBazar) 
					join movimiento c using(idVenta)
				where idEmpresa = ".$userSesion->getEmpresa()." and a.visible = true and a.estado = 1
				group by a.idBazar;";
			
			$rs = $db->query($sql);
			$datos = array();
			$suma = 0;
			while($row = $rs->fetch_assoc()){
				$suma += $row['total'];
				$row['total'] = number_format($row['total'], 2, '.', ',');
				$row['json'] = json_encode($row);
				
				array_push($datos, $row);
			}
			$smarty->assign("bazares", $datos);
			$smarty->assign("totalBazares", number_format($suma, 2, '.', ','));
		}
	break;
	case 'interfaz':
		$db = TBase::conectaDB();
		
		$sql = "select idEmpresa from empresa where visible = 1 and activo = 1 and ultimocorte < now()";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		while($rowEmpresa = $rs->fetch_assoc()){
			$empresa = new TEmpresa($rowEmpresa['idEmpresa']);
			
			$sql = "select idVenta, descuento from venta a join bazar b using(idBazar) where fecha between '".$empresa->getUltimoCorte()."' and date_sub(NOW(), INTERVAL 1 DAY) and idEmpresa = ".$empresa->getId();
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
			
			$comision =  new TComision;
			$comision->setEmpresa($empresa->getId());
			$comision->setInicio($empresa->getUltimoCorte());
			$comision->setFin(date("Y-m-d"));
			$comision->setComision($empresa->getComision());
			$comision->setMonto($suma);
			
			if ($comision->guardar()){
				$empresa->setUltimoCorte();
				$empresa->guardar();
			}
		}
	break;
}
?>