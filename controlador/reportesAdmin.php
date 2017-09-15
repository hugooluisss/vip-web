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
		$sql = "select a.idVenta, idBazar, idEstado, d.nombre as estado, d.color, fecha, a.folio, descuento, b.nombre as bazar from venta a join bazar b using(idBazar) join estado d using(idEstado) where fecha between '".$_POST['inicio']."' and '".$_POST['fin']."' and b.idEmpresa = ".$_POST['empresa'];
			
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
	break;
	case 'listaCobranza':
		$db = TBase::conectaDB();
		$sql = "select a.*, b.razonsocial from comision a join empresa b using(idEmpresa)";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		$repositorio = "repositorio/facturas/";
		while($row = $rs->fetch_assoc()){
			$archivo = $repositorio."factura".$row['idComision'].".pdf";
			$row['factura'] = file_exists($archivo)?$archivo:"";
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
				$msg = $comision->cargar($_POST['tarjeta'], $_POST['device_session']);
				
				$smarty->assign("json", array("band" => $msg == '', "mensaje" => $msg));
			break;
			case 'upload':
				$comision = new TComision($_GET['id']);
				
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
					if(move_uploaded_file($_FILES['upl']['tmp_name'], $repositorio."factura".$_GET['id'].".pdf"))
						$result = array("status" => true);
					else{
						$result = array("status" => false);
					}
				}else
					$result = array("status" => false);
				
				$smarty->assign("json", $result);
			break;
		}
	break;
}
?>