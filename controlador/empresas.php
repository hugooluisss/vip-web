<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaEmpresas':
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
	case 'miEmpresa':
		global $userSesion;
		$smarty->assign("empresa", new TEmpresa($userSesion->getEmpresa()));
	break;
	case 'cempresas':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TEmpresa();
				
				$obj->setId($_POST['id']);
				$obj->setRazonSocial($_POST['razonSocial']);
				$obj->setSlogan($_POST['slogan']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setExterno($_POST['externo']);
				$obj->setInterno($_POST['interno']);
				$obj->setColonia($_POST['colonia']);
				$obj->setMunicipio($_POST['municipio']);
				$obj->setCiudad($_POST['ciudad']);
				$obj->setEstado($_POST['estado']);
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
			case 'setParametros':
				global $userSesion;
				$obj = new TEmpresa($userSesion->getEmpresa());
				$parametros = $obj->getParametros();
				
				$parametros["clienteDefault"] = $_POST['clienteDefault'] == ''?$parametros["clienteDefault"]:$_POST['clienteDefault'];
				
				$obj->setParametros($parametros);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
		}
	break;
}
?>