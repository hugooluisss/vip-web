<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->query("select b.folio, a.* from movimiento a join venta b using(idVenta) join bazar c using(idBazar) where entregado < cantidad and idEmpresa = ".$userSesion->getEmpresa()." limit 10");
		
		$datos = array();
		
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("productosSinEntregar", $datos);
	break;
}
?>