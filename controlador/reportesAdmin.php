<?php
global $objModulo;
switch($objModulo->getId()){
	case 'admonreporteventasempresa':
		$db = TBase::conectaDB();
		$sql = "select * from empresa";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		$smarty->assign("empresas", $datos);
		global $ini;
		$smarty->assign("openpay", $ini['openpay']);
	break;
	case 'listaReporteAdminVentas':
		$db = TBase::conectaDB();
		if ($_POST['empresa'] <> ''){
			$empresasSQL = "";
			foreach($_POST['empresa'] as $empresa)
				$empresasSQL .= ($empresasSQL == ''?"":",").$empresa;
				
			$sql = "select a.idVenta, idBazar, idEstado, d.nombre as estado, d.color, fecha, a.folio, descuento, b.nombre as bazar, e.razonsocial as empresa from venta a join bazar b using(idBazar) join estado d using(idEstado) join empresa e using(idEmpresa) where fecha between '".$_POST['inicio']."' and '".$_POST['fin']."' and b.idEmpresa in (".$empresasSQL.")".($_POST['soloCerradas'] == 1?" and idEstado = 2":"");
				
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			$datos = array();
			$total = 0;
			$totalPagos = 0;
			
			$totalCerradas = 0;
			while($row = $rs->fetch_assoc()){
				$sql = "select sum(precio * cantidad * (1-descuento/100)) as total from movimiento where idVenta = ".$row['idVenta'];
				
				$rs2 = $db->query($sql) or errorMySQL($db, $sql);
				$row2 = $rs2->fetch_assoc();
				$row['total'] = $row2['total'] * (1 - $row['descuento'] / 100);
				$total += $row['total'];
				$row['total'] = number_format($row['total'], 2, '.', ',');
				
				
				$sql = "select sum(monto) as pagos from pago where visible = true and idVenta = ".$row['idVenta'];
				$rs2 = $db->query($sql) or errorMySQL($db, $sql);
				$row2 = $rs2->fetch_assoc();
				$totalCerradas += $row['idEstado'] == 2?$row['total']:0;
				
				$row['pagos'] = number_format($row2['pagos'], 2, '.', ',');
				$totalPagos += $row2['pagos'];
				$row['json'] = json_encode($row);
				
				array_push($datos, $row);
			}
			
			$smarty->assign("lista", $datos);
			$smarty->assign("total", number_format($total, 2, '.', ','));
			$smarty->assign("totalPagos", number_format($totalPagos, 2, '.', ','));
			$smarty->assign("totalCerradas", number_format($totalCerradas, 2, '.', ','));
		}else
			$smarty->assign("lista", array());
	break;
	case 'cobranza':
		global $ini;
		$smarty->assign("openpay", $ini['openpay']);
	break;
	case 'listaCobranza':
		$db = TBase::conectaDB();
		$sql = "select a.*, b.razonsocial from comision a join empresa b using(idEmpresa)";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		$repositorio = "repositorio/facturas/";
		while($row = $rs->fetch_assoc()){
			$files = glob($repositorio."factura".$row['idComision'].".*");
			#$archivo = $repositorio."factura".$row['idComision'].".pdf";
			$row['factura'] = file_exists($files[0])?$files[0]:"";
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'ccobranza':
		$repositorio = "repositorio/facturas/";
		switch($objModulo->getAction()){
			case 'pagar':
				$comision = new TComision($_POST['id']);
				$comision->setComision($_POST['comision']);
				$comision->guardar();
				
				$msg = $comision->cargar($_POST['tarjeta'], $_POST['device_session']);
				
				$smarty->assign("json", array("band" => $msg == '', "mensaje" => $msg));
			break;
			case 'upload':
				$comision = new TComision($_GET['id']);
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
					$extension = strtolower(end(explode(".", $_FILES['upl']['name'])));
					foreach (glob($repositorio."factura".$_GET['id'].".*") as $nombre_fichero){
						unlink($nombre_fichero);
					}
						
					if(move_uploaded_file($_FILES['upl']['tmp_name'], $repositorio."factura".$_GET['id'].".".$extension))
						$result = array("status" => true);
					else{
						$result = array("status" => false, "msg" => "Al copiar");
					}
				}else
					$result = array("status" => false, "msg" => "No se subió");
				
				$smarty->assign("json", $result);
			break;
		}
	break;
}
?>