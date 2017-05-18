<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaMetodosPago':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select * from metodopago a where idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cmetodospago':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				global $userSesion;
				$obj = new TMetodoPago();
				
				$obj->setId($_POST['id']);
				if ($_POST['id'] == '')
					$obj->empresa->setId($userSesion->getEmpresa());
					
				$obj->setNombre($_POST['nombre']);
				$obj->setDevoluciones($_POST['devoluciones']);
				$obj->setReferencia($_POST['referencia']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TMetodoPago($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>