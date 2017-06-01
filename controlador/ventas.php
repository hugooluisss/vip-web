<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaVentas':
		$db = TBase::conectaDB();
		global $sesion;
		
		$rs = $db->query("select * from empresa a where a.visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cempresas':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TEmpresa();
				
				$obj->setId($_POST['id']);
				$obj->setRazonSocial($_POST['razonSocial']);
				$obj->setSlogan($_POST['slogan']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setEmail($_POST['email']);
				$obj->setRFC($_POST['rfc']);
				$obj->setActivo($_POST['activo']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TEmpresa($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>