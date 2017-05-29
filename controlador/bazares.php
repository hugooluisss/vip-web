<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaBazares':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select * from bazar a where a.visible = true and idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'inventario':
		$smarty->assign("bazar", $_GET['id']);
	break;
	case 'cbazares':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				$db = TBase::conectaDB();
				$obj = new TBazar();
				
				$obj->setId($_POST['id']);
				$obj->setInicio($_POST['inicio']);
				$obj->setEstado($_POST['estado']);
				$obj->setEmpresa($userSesion->getEmpresa());
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TBazar($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>