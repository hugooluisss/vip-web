<?php
global $objModulo;
switch($objModulo->getId()){
	case 'admonUsuarios':
		$db = TBase::conectaDB();
		global $sesion;
		$usuario = new TUsuario($sesion['usuario']);
		
		if ($_GET['id'] == '')
			$rs = $db->query("select * from tipoUsuario where rol = 'A'"); #Administración
		else
			$rs = $db->query("select * from tipoUsuario where rol = 'B'"); #Bazas
			
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idTipoUsuario']] = $row['nombre'];
		}
		
		$smarty->assign("tipos", $datos);
		$smarty->assign("empresa", new TEmpresa($_GET['id']));
	break;
	case 'misUsuarios':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select * from tipoUsuario where rol = 'B'"); #Bazas
			
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idTipoUsuario']] = $row['nombre'];
		}
		
		$smarty->assign("tipos", $datos);
	break;
	case 'listaUsuariosBazar':
		$db = TBase::conectaDB();
		global $userSesion;
		
		if ($userSesion->getEmpresa() <> '') #Estamos dentro de una empresa
			$sql = "select * from usuario a where a.visible = true and idUsuario in (select idUsuario from usuarioempresa where idEmpresa = ".$userSesion->getEmpresa().")";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$obj = new TUsuario($row['idUsuario']);
			
			$row['tipo'] = $obj->getTipo();
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		global $sesion;
		$usuario = new TUsuario($sesion['usuario']);
		$sql = "select * from usuario a where a.visible = true and idTipo = 1";
		
		if ($_POST['empresa'] <> '') #Estamos dentro de una empresa
			$sql = "select * from usuario a where a.visible = true and idUsuario in (select idUsuario from usuarioempresa where idEmpresa = ".$_POST['empresa'].")";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$obj = new TUsuario($row['idUsuario']);
			
			$row['tipo'] = $obj->getTipo();
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("empresa", $_GET['id']);
	break;
	case 'usuarioDatosPersonales':
		global $sesion;
		$usuario = new TUsuario($sesion['usuario']);
		$smarty->assign("nombre", $usuario->getNombre());
		$smarty->assign("app", $usuario->getApp());
		$smarty->assign("apm", $usuario->getApm());
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TUsuario();
				
				$rs = $db->query("select idUsuario from usuario where email = '".$_POST['clave']."'");
				
				if ($rs->num_rows > 0){ #si es que encontró la clave
					$row = $rs->fetch_assoc();
					if ($row["idUsuario"] <> $_POST['id']){
						$obj->setId($row['idUsuario']);
						echo json_encode(array("band" => false, "mensaje" => "El correo ya se encuentra registrado con el usuario ".$obj->getNombreCompleto()));
						exit(1);
					}
				}

				$obj = new TUsuario();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setEmail($_POST['email']);
				if ($_POST['pass'] <> '')
					$obj->setPass($_POST['pass']);
					
				$obj->setTipo($_POST['tipo']);
				$band = $obj->guardar();
				
				if ($_POST['id'] == ''){
					if ($band and $_POST['empresa'] <> ''){
						$empresa = new TEmpresa($_POST['empresa']);
						$empresa->addUsuario($obj->getId());
					}else{
						global $userSesion;
						if ($userSesion->getEmpresa() <> ''){
							$empresa = new TEmpresa($userSesion->getEmpresa());
							$empresa->addUsuario($obj->getId());
						}
					}
				}
				
				$sendmail = $_POST['sendmail'] == ''?true:($_POST['sendmail'] <> 'false'?true:false);
				if ($obj->getEmpresa() <> '' and $_POST['id'] == '' and $sendmail){
					global $ini;
						$email = new TMail();
						$email->setTema("Registro de usuario");
						$email->addDestino($obj->getEmail());
						
						$datos = array();
						$datos['usuario.nombre'] = $obj->getNombre();
						$datos['usuario.correo'] = $obj->getEmail();
						$datos['usuario.pass'] = $obj->getPass();
						
						switch($obj->getIdTipo()){
							case 2:
								$s = '<li>Actualizar los datos de tu empresa</li>';
								$s .= '<li>Configurar tus métodos de cobro</li>';
								$s .= '<li>Crear mas cuentas de usuario</li>';
								$s .= '<li>Crear tu próximo bazar o mercado</li>';
								$s .= '<li>Dar de alta tus productos e inventario de manera sencilla</li>';
								$s .= '<li>Realizar ventas</li>';
							break;
							case 3:
								$s = '<li>Realizar ventas</li>';
								$s .= '<li>Agregar nuevos productos</li>';
								$s .= '<li>Crear nuevas cuentas de clientes</li>';
							break;
							case 4:
								$s = '<li>Dar de alta tus productos e inventario de manera sencilla</li>';
							break;
							default:
								$s = "<li>Sin roles</li>";
						}
						
						$datos['usuario.roles'] = $s;
						
						$email->setBodyHTML($email->construyeMail(file_get_contents("repositorio/mail/nuevoUsuario.html"), $datos));
						
						$bandEmail = $email->send();
				}
				
				$smarty->assign("json", array("band" => $band));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'saveDatosPersonales':
				global $sesion;
				
				$obj = new TUsuario();
				$obj->setId($sesion['usuario']);
				$obj->setNombre($_POST['nombre']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'savePassword':
				global $sesion;
				
				$obj = new TUsuario();
				$obj->setId($sesion['usuario']);
				$obj->setPass($_POST['pass']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'validaUsuario':
				$db = TBase::conectaDB();
				
				$rs = $db->query("select idUsuario from usuario where upper(email) = upper('".$_POST['txtEmail']."')");
				$row = $rs->fetch_assoc();
				if ($rs->num_rows > 0){
					if ($_POST['usuario'] <> '')
						echo $row['idUsuario'] <> $_POST['usuario']?"false":"true";
					else
						echo "false";
				}else
					echo "true";
			break;
		}
	break;
}
?>