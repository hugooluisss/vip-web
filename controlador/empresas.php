<?php
global $objModulo;
require_once('librerias/openpay/Openpay.php');
$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);

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
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$smarty->assign("empresa", $empresa);
		
		$datos = array();
		$json = array();
		
		if ($empresa->getIdPay() == '')
			$empresa->setIdPay();
			
		try{
			$cliente = $openpay->customers->get($empresa->getIdPay());
			$tarjetas = $cliente->cards->getList(array());
			$smarty->assign("tarjeta", $tarjetas[0]);	
		}catch(Exception $e){
			ErrorSistema("PAY: ".$e->getMessage());
			$smarty->assign("tarjeta", array());
		}
		global $ini;
		$smarty->assign("openpay", $ini['openpay']);
	break;
	case 'cempresas':
		switch($objModulo->getAction()){
			case 'add':
				$band = true;
				if ($_POST['id'] == ''){
					$db = TBase::conectaDB();
					
					$rs = $db->query("select * from usuario where upper(email) = upper('".$_POST['email']."')");
					
					$band = $rs->num_rows == 0;
				}
				
				if ($band){
					$obj = new TEmpresa();
					
					$obj->setId($_POST['id']);
					$obj->setRazonSocial($_POST['razonSocial']);
					$obj->setSlogan($_POST['slogan']);
					$obj->setMarca($_POST['marca']);
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
					if (!isset($_POST['id']))
						$obj->setActivo(true);
					else
						$obj->setActivo($_POST['activo']);
					
					if ($_POST['comision'] <> '')
						$obj->setComision($_POST['comision']);
					
					$bandEmail = false;
					if($_POST['id'] == ''){ #es una nueva empresa
						global $ini;
						$email = new TMail();
						$email->setTema("Registro de empresa");
						$email->addDestino($_POST['email']);
						
						$datos = array();
						$datos['empresa.razonsocial'] = $obj->getRazonSocial();
						$datos['empresa.correo'] = $obj->getEmail();
						
						$email->setBodyHTML($email->construyeMail(file_get_contents("repositorio/mail/registroEmpresa.html"), $datos));
						
						$bandEmail = $email->send();
					}
					
					$smarty->assign("json", array("band" => $obj->guardar(), "id" => $obj->getId(), "email" => $bandEmail));
				}else
					$smarty->assign("json", array("band" => $band));
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
			case 'uploadfile':
				$ext = explode(".", $_FILES['upl']['name']);
				$ext = $ext[count($ext) - 1];
				
				if (strtolower($ext) == 'jpg' or strtolower($ext) == 'jpeg'){
					if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0 and $_GET['empresa'] <> ''){
						$carpeta = "repositorio/empresas/";
						mkdir($carpeta, 0777, true);
						chmod($carpeta, 0755);
						#$_FILES['upl']['name']
						if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta."empresa".$_GET['empresa'].".jpg")){
							chmod($carpeta."empresa".$_POST['id'].".jpg", 0755);
							
							echo '{"status":"success"}';
							exit;
						}
					}
				}
				
				echo '{"status":"error"}';
			break;
			case 'cargarACuenta':
				global $ini;
				require_once('librerias/openpay/Openpay.php');
				$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);
				$empresa = new TEmpresa($_POST['empresa']);
				
				try{
					$cliente = $openpay->customers->get($empresa->getIdPay());
					$cargo = $cliente->charges->create(array(
						'method' => 'card',
						'source_id' => $_POST['tarjeta'],
						'amount' => $_POST['monto'],
						'currency' => 'MXN',
						'description' => $_POST['concepto'],
						'device_session_id' => $_POST['device_session']
						)
					);
										
					$band = true;
				}catch(Exception $e){
					$mensaje = $e->getMessage();
					$band = false;
				}
				
				$smarty->assign("json", array("band" => $band, "cargo" => $cargo, "mensaje" => $mensaje));
			break;
			case 'validaUsuario':
				$db = TBase::conectaDB();
				$rs = $db->query("select idUsuario from usuario where upper(email) = upper('".$_POST['txtEmail']."')");
				
				echo $rs->num_rows == 0?"true":"false";
			break;
			case 'validaRazonSocial':
				$db = TBase::conectaDB();
				global $pageSesion;
				
				if (isset($_POST['empresa']))
					$sql = "select idEmpresa from empresa where upper(razonsocial) = upper('".$_POST['txtRazonSocial']."') and not idEmpresa = ".$_POST['empresa'];
				elseif ($pageSesion->getEmpresa() <> '')
					$sql = "select idEmpresa from empresa where upper(razonsocial) = upper('".$_POST['txtRazonSocial']."') and not idEmpresa = ".$pageSesion->getId();
				else
					$sql = "select idEmpresa from empresa where upper(razonsocial) = upper('".$_POST['txtRazonSocial']."')";
					
				$rs = $db->query($sql);
				
				echo $rs->num_rows == 0?"true":"false";
			break;
		}
	break;
}
?>