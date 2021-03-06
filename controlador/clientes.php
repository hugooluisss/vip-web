<?php
global $objModulo;
switch($objModulo->getId()){
	case 'clientes':
	break;
	case 'listaClientes':
		$db = TBase::conectaDB();
		global $userSesion;
		$usuario = isset($_POST['usuario'])?(new TUsuario($_POST['usuario'])):$userSesion;
		
		$rs = $db->query("select * from cliente a where a.visible = true and idEmpresa = ".$usuario->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("select", $_POST['select']);
		$empresa = new TEmpresa($usuario->getEmpresa());
		$smarty->assign("parametros", $empresa->getParametros());
	break;
	case 'listaClientesAutocomplete':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select * from cliente a where a.visible = true and idEmpresa = ".$userSesion->getEmpresa()." and (nombre like '%".$_GET['term']."%' or razonsocial like '%".$_GET['term']."%')");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$aux = array();
			
			$aux["label"] = $row['nombre'];
			$aux['identificador'] = $row['idCliente'];
			$aux['correo'] = $row['correo'];
			
			array_push($datos, $aux);
		}
		$smarty->assign("json", $datos);
	break;
	case 'cclientes':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				$obj = new TCliente();
				
				$obj->setId($_POST['id']);
				if ($_POST['idUsuario'] == '')
					$obj->setEmpresa($userSesion->getEmpresa());
				else{
					$usuario = new TUsuario($_POST['idUsuario']);
					$obj->setEmpresa($usuario->getEmpresa());
				}
				$obj->setRazonSocial($_POST['razonSocial']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDomicilio($_POST['domicilio']);
				$obj->setExterior($_POST['exterior']);
				$obj->setInterior($_POST['interior']);
				$obj->setNombre($_POST['nombre']);
				$obj->setColonia($_POST['colonia']);
				$obj->setMunicipio($_POST['municipio']);
				$obj->setCiudad($_POST['ciudad']);
				$obj->setEstado($_POST['estado']);
				$obj->setRFC($_POST['rfc']);
				$obj->setCorreo($_POST['correo']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setPromociones($_POST['promciones']);
				
				$smarty->assign("json", array("band" => $obj->guardar(), "id" => $obj->getId()));
			break;
			case 'del':
				$obj = new TCliente($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>