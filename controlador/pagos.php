<?php
global $objModulo;
switch($objModulo->getId()){
	case 'pagos':
	break;
	case 'listaPagos':
		$db = TBase::conectaDB();
		global $userSesion;
		$datos = array();
		$total = 0;
		if ($_POST['venta'] <> ''){
			$rs = $db->query("select a.*, b.destino as nombreCobro, c.nombre as nombrePago from pago a join metodocobro b using(idMetodoCobro) join metodopago c using(idMetodoPago) where a.visible = true and idVenta = ".$_POST['venta']);
			while($row = $rs->fetch_assoc()){
				$row['json'] = json_encode($row);
				$total += $row['monto'];
				array_push($datos, $row);
			}
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("total", $total);
	break;
	case 'cpagos':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				$obj = new TPago();
				
				$obj->setId($_POST['id']);
				$obj->setVenta($_POST['venta']);
				$obj->metodoCobro = new TMetodoCobro($_POST['metodoCobro']);
				$obj->metodoPago = new TMetodoPago($_POST['metodoPago']);
				$obj->setMonto($_POST['monto']);
				$obj->setReferencia($_POST['referencia']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPago($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>