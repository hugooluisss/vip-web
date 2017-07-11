<?php
global $objModulo;
switch($objModulo->getId()){
	case 'reporteventas':
		$db = TBase::conectaDB();
		$sql = "select * from estado";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("estados", $datos);
	case 'reporteexistencias':
		global $userSesion;
		$db = TBase::conectaDB();
		$sql = "select * from bazar a join usuariobazar b using(idBazar) where idUsuario = ".$userSesion->getId()." and a.visible = 1 and estado = 1";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("bazares", $datos);

	break;
	case 'listaReporteVentas':
		$db = TBase::conectaDB();
		
		if ($_POST['bazar'] == ''){
			global $userSesion;
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, b.idBazar, c.nombre as cliente from venta a join bazar b using(idBazar) join cliente c using(idCliente) where b.idEmpresa = ".$userSesion->getEmpresa()." and b.visible = 1 and a.idEstado = ".$_POST['estado']." and a.fecha between '".$_POST['inicio']."' and '".$_POST['fin']."' order by fecha desc";
		}else
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, b.idBazar, c.nombre as cliente from venta a join bazar b using(idBazar) join cliente c using(idCliente) where a.idBazar = ".$_POST['bazar']." and b.visible = 1 and a.idEstado = ".$_POST['estado']." order by fecha desc;";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$sql = "select sum(precio * cantidad * (1-descuento/100)) as total from movimiento where idVenta = ".$row['idVenta'];
			
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			$row['total'] = $row2['total'] * (1 - $row['descuento'] / 100);
			$row['total'] = number_format($row['total'], 2, '.', ',');
			
			$rs2 = $db->query("select sum(monto) as monto from pago a where idVenta = ".$row['idVenta']);
			$row2 = $rs2->fetch_assoc();
			$row['pagos'] = number_format($row2['monto'], 2, '.', ',');
			
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("bazar", $_POST['bazar']);
	break;
	case 'listaReporteExistencias':
		$db = TBase::conectaDB();
		
		if ($_POST['bazar'] == ''){
			global $userSesion;
			$sql = "select a.*, b.nombre as bazar from producto a join bazar b using(idBazar) where b.idEmpresa = ".$userSesion->getEmpresa()." and a.visible = true and b.visible = true";
		}else
			$sql = "select a.*, b.nombre as bazar from producto a join bazar b using(idBazar) where a.idBazar = ".$_POST['bazar']." and a.visible = true";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$producto = new TProducto($row['idProducto']);
			$row['inventario'] = $producto->getInventarioDisponible();
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("bazar", $_POST['bazar']);
	break;
	case 'listaReporteVentasProducto':
		$db = TBase::conectaDB();
		
		$sql = "select b.*, cantidad, entregado, c.nombre as cliente from movimiento a join venta b using(idVenta) join cliente c using(idCliente) where idProducto = ".$_POST['producto']." order by fecha desc";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	
	case 'listaReportesPagosPorVenta':
		$db = TBase::conectaDB();
		$venta = new TVenta($_POST['venta']);
		$sql = "select fecha, monto, referencia, nombre, destino, b.nombre as metodoPago, c.destino as metodoCobro from pago a join metodopago b using(idMetodoPago) join metodocobro c using(idMetodocobro) where idVenta = ".$_POST['venta'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		$saldo = $venta->getMonto();
		while($row = $rs->fetch_assoc()){
			$row['saldo'] = number_format($saldo, 2, '.', ',');
			$saldo -= $row['monto'];
			$row['monto'] = number_format($row['monto'], 2, '.', ',');
			
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("saldo", number_format($saldo, 2, '.', ','));
	break;
}
?>