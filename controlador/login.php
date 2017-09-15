<?php
global $objModulo;

switch($objModulo->getId()){
	case 'logout':
		unset($_SESSION['usuario']);
		session_destroy();
		
		header('Location: index.php');
	break;
	default:
		switch($objModulo->getAction()){
			case 'login':
				$db = TBase::conectaDB();
				$rs = $db->query("select idUsuario, pass from usuario where upper(email) = upper('".$_POST['usuario']."') and visible = true");
				$result = array('band' => false, 'mensaje' => 'Error al consultar los datos');
				
				$row = $rs->fetch_assoc();
				
				if($rs->num_rows == 0)
					$result = array('band' => false, 'mensaje' => 'El usuario no existe');
				elseif(strtoupper($row['pass']) <> strtoupper($_POST['pass']))
					$result = array('band' => false, 'mensaje' => 'Contraseña inválida');
				else{
					$obj = new TUsuario($row['idUsuario']);
					if ($obj->getId() == '')
						$result = array('band' => false, 'mensaje' => 'Acceso denegado', 'tipo' => $obj->getIdTipo());
					else{
						if ($obj->getIdTipo() == 1){
							$obj = new TUsuario($row['idUsuario']);
							$sesion['usuario'] = $obj->getId();
							$sesion['perfil'] = $obj->getIdTipo();
							
							$_SESSION[SISTEMA] = $sesion;


							$result = array('band' => true, "totalTarjetas" => 1, 'tipo' => $obj->getIdTipo());
						}else{
							global $userSesion;
							$empresa = new TEmpresa($obj->getEmpresa());
							
							$datos = array();
							$json = array();
							$obj = new TUsuario($row['idUsuario']);
							$sesion['usuario'] = $obj->getId();
							$sesion['perfil'] = $obj->getIdTipo();
							
							$_SESSION[SISTEMA] = $sesion;
							$result = array('band' => true, 'tipo' => $obj->getIdTipo(), 'empresa' => $empresa->getId(), "datos" => $sesion);
							/*
							require_once('librerias/openpay/Openpay.php');
							$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);
							
							if ($empresa->getIdPay() == '')
								$empresa->setIdPay();
							
							try{
								$cliente = $openpay->customers->get($empresa->getIdPay());
								$tarjetas = $cliente->cards->getList(array());
								
								if(count($tarjetas) > 0){
									$obj = new TUsuario($row['idUsuario']);
									$sesion['usuario'] = $obj->getId();
									$sesion['perfil'] = $obj->getIdTipo();
									
									$_SESSION[SISTEMA] = $sesion;
								}
								
								$result = array('band' => true, "totalTarjetas" => count($tarjetas), 'tipo' => $obj->getIdTipo(), 'empresa' => $empresa->getId());
								
								$result['datos'] = $sesion;
							}catch(Exception $e){
								ErrorSistema("PAY: ".$e->getMessage());
								
								$result = array('band' => false);
							}
							*/
						}
					}
				}
				
				echo json_encode($result);
			break;
			case 'logout':
				$_SESSION[SISTEMA] = array();
				session_destroy();
				
				header ("Location: index.php");
			break;
		}
	break;
}
?>