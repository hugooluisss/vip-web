<?php
global $objModulo;
switch($objModulo->getId()){
	case 'bazares':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$smarty->assign("informacionCompleta", $empresa->isCompletaInformacion());
		
		$rs = $db->query("select a.*, c.nombre as perfil from usuario a join usuarioempresa b using(idUsuario) join tipoUsuario c on a.idTipo = c.idTipoUsuario and b.idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		
		$datos["tipo2"] = array();
		$datos["tipo3"] = array();
		$datos["tipo4"] = array();
		
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos["tipo".$row['idTipo']], $row);
		}
		
		$smarty->assign("usuarios", $datos);
		
		$rs = $db->query("select * from tipoUsuario where rol = 'B'"); #Bazas
			
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idTipoUsuario']] = $row['nombre'];
		}
		
		$smarty->assign("tipos", $datos);
	break;
	case 'productos':
		$smarty->assign("bazar", $_GET['id']);
		
		$db = TBase::conectaDB();
		global $userSesion;
		
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$smarty->assign("informacionCompleta", $empresa->isCompletaInformacion());
		
		$rs = $db->query("select count(*) as total from usuario a join usuariobazar b using(idUsuario) where b.idUsuario = ".$userSesion->getId());
		$row = $rs->fetch_assoc();
		
		$smarty->assign("totalBazares", $row['total'] > 0);
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
	case 'cbazares':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				$obj = new TBazar();
				
				$obj->setId($_POST['id']);
				$obj->setInicio($_POST['inicio']);
				$obj->setFin($_POST['fin'] == ''?date("Y-m-d"):$_POST['fin']);
				$obj->setEstado($_POST['estado']);
				$obj->setNombre($_POST['nombre']);
				$obj->setEmpresa($userSesion->getEmpresa());
				$obj->setFolio($_POST['folio']);
				$obj->setInicial($_POST['inicial'] == ''?0:$_POST['inicial']);
				
				$band = $obj->guardar();
				if ($band and $_POST['id'] == ''){
					$obj->addUsuario($userSesion->getId());
				}
				$smarty->assign("json", array("band" => $band, "id" => $obj->getId()));
			break;
			case 'del':
				$obj = new TBazar($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'getUsuarios':
				$db = TBase::conectaDB();
				$sql = "select * from usuariobazar where idBazar = ".$_POST['id'].";";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$datos = array();
				while($row = $rs->fetch_assoc()){
					array_push($datos, $row);
				}
				
				$smarty->assign("json", array("usuarios" => $datos));
			break;
			case 'setUsuario':
				$obj = new TBazar($_POST['id']);
				$smarty->assign("json", array("band" => $obj->addUsuario($_POST['usuario'])));
			break;
			case 'delUsuario':
				$obj = new TBazar($_POST['id']);
				$smarty->assign("json", array("band" => $obj->delUsuario($_POST['usuario'])));
			break;
			case 'getFolio':
				$obj = new TBazar($_POST['id']);
				$smarty->assign("json", array("folio" => sprintf("%08s", $obj->getNextFolio()), "inicial" => $obj->getInicial()));
			break;
		}
	break;
}
?>