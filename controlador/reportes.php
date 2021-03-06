<?php
global $objModulo;
switch($objModulo->getId()){
	case 'cobranzaVIP':
		$fecha = new DateTime;
		$fecha->sub(new DateInterval('P30D'));
		$smarty->assign("fin", $fecha->format('Y-m-d'));
	break;
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
	case 'reporteexistencias': case 'reportepedidos':
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
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, b.idBazar, c.nombre as cliente, descuento from venta a join bazar b using(idBazar) join cliente c using(idCliente) where b.idEmpresa = ".$userSesion->getEmpresa()." and b.visible = 1 and a.idEstado = 2 and a.fecha between '".$_POST['inicio']."' and '".$_POST['fin']."' order by fecha desc";
		}else
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, b.idBazar, c.nombre as cliente, descuento from venta a join bazar b using(idBazar) join cliente c using(idCliente) where a.idBazar = ".$_POST['bazar']." and b.visible = 1 and a.idEstado = 2 order by fecha desc;";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		$montoTotal = 0;
		$totalPagado = 0;
		while($row = $rs->fetch_assoc()){
			$sql = "select sum(precio * cantidad * (1-descuento/100)) as total from movimiento where idVenta = ".$row['idVenta'];
			
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			$row['total'] = $row2['total'] * (1 - $row['descuento'] / 100);
			$montoTotal += $row['total'];
			$row['total'] = number_format($row['total'], 2, '.', ',');
			
			$rs2 = $db->query("select sum(monto) as monto from pago a where idVenta = ".$row['idVenta']);
			$row2 = $rs2->fetch_assoc();
			$totalPagado += $row2['monto'];
			$row['pagos'] = number_format($row2['monto'], 2, '.', ',');
			
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("bazar", $_POST['bazar']);
		
		$smarty->assign("totalMonto", number_format($montoTotal, 2, '.', ','));
		$smarty->assign("totalPagado", number_format($totalPagado, 2, '.', ','));
	break;
	case 'listaReportePedidos':
		$db = TBase::conectaDB();
		
		if ($_POST['bazar'] == ''){
			global $userSesion;
			
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, b.idBazar, c.nombre as cliente, d.descripcion, sum(d.cantidad) as cantidad, sum(d.entregado) as entregado from venta a join bazar b using(idBazar) join cliente c using(idCliente) join movimiento d using(idVenta) where b.idEmpresa = ".$userSesion->getEmpresa()." and b.visible = 1 and d.cantidad > d.entregado group by a.idVenta order by fecha desc";
		}else
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, b.idBazar, c.nombre as cliente, d.descripcion, sum(d.cantidad) as cantidad, sum(d.entregado) as entregado from venta a join bazar b using(idBazar) join cliente c using(idCliente) join movimiento d using(idVenta) where a.idBazar = ".$_POST['bazar']." and b.visible = 1 and d.cantidad > d.entregado group by a.idVenta order by fecha desc;";
			
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
			
			$row['vendidos'] = $producto->getVendidos();
			$row['entregados'] = $producto->getEntregados();
			$row['apartados'] = $producto->getApartados();
			$row['pedidos'] = $producto->getPedidos();
			
			unset($producto);
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("bazar", $_POST['bazar']);
	break;
	case 'listaReporteVentasProducto':
		$db = TBase::conectaDB();
		
		$sql = "select b.*, cantidad, entregado, c.nombre as cliente, d.nombre as estado, d.color as colorEstado from movimiento a join venta b using(idVenta) join cliente c using(idCliente) join estado d using(idEstado) where idProducto = ".$_POST['producto']." and idEstado in (1, 2) order by fecha desc";
			
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
	
	case 'listaCobranzaVIP':
		$db = TBase::conectaDB();
		$sql = "select * from comision a where idEmpresa = ".$userSesion->getEmpresa()." and registro between '".$_POST['inicio']." 00:00:00' and '".$_POST['fin']." 23:59:59'";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		$repositorio = "repositorio/facturas/";
		while($row = $rs->fetch_assoc()){
			$files = glob($repositorio."factura".$row['idComision'].".*");
			$row['factura'] = file_exists($files[0])?$files[0]:"";
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
}
?>