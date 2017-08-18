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
}
?>