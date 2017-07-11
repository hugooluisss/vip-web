<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->query("select b.folio, a.*, c.nombre as bazar from movimiento a join venta b using(idVenta) join bazar c using(idBazar) where entregado < cantidad and idEmpresa = ".$userSesion->getEmpresa()." limit 10");
		
		$datos = array();
		
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("productosSinEntregar", $datos);
		
		$rs = $db->query("select *, d.nombre as bazar from pago a join metodocobro b using(idMetodoCobro) join venta c using(idVenta) join bazar d using(idBazar) join usuariobazar e using(idBazar) where idUsuario = ".$userSesion->getId());
		
		$datos = array();
		$total = 0;
		while($row = $rs->fetch_assoc()){
			$total += $row['monto'];
			$row['monto'] = number_format($row['monto'], 2, '.', ',');
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		$smarty->assign("pagos", $datos);
		$smarty->assign("totalPagos", number_format($total, 2, '.', ','));
	break;
}
?>