<?php
global $objModulo;
require_once("librerias/conekta/Conekta.php");
\Conekta\Conekta::setApiKey($ini['conekta']['key_private']);
\Conekta\Conekta::setLocale('es');
\Conekta\Conekta::setApiVersion("2.0.0");

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
					$obj->setActivo($_POST['activo']);
					
					if($_POST['id'] == ''){ #es una nueva empresa
						global $ini;
						$email = new TMail();
						$email->setTema("Registro de empresa");
						$email->addDestino($_POST['email']);
						
						$datos = array();
						$datos['empresa.razonsocial'] = $obj->getRazonSocial();
						$datos['empresa.correo'] = $obj->getEmail();
						
						$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/registroEmpresa.html"), $datos)));
						
						$bandEmail = $email->send();
					}
					
					$smarty->assign("json", array("band" => $obj->guardar(), "id" => $obj->getId()));
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
				
				echo '{"status":"error"}';
			break;
			case 'crearOrdenConekta':
				$empresa = new TEmpresa($_POST['id']);
				$datos = array();
				if ($empresa->getIdConekta() == ''){
					$empresa->setClienteConekta();
				}
				
				$mensaje = "";
				
				if ($empresa->getIdConekta() <> ''){
					try{
						$orden = \Conekta\Order::create(array(
							'currency' => 'MXN',
							'customer_info' => array(
								'customer_id' => $empresa->getIdConekta()
							),
							'line_items' => array(
								array(
									'name' => $_POST['concepto'],
									'unit_price' => $_POST['total'] * 100,
									'quantity' => 1
								)
							)
						));
					}catch(Exception $e){
						$band = false;
						$mensaje = $e->getMessage();
						ErrorSistema("Conekta: Ocurrió un error al registrar al cliente... ".$e->getMessage());
					}
				
					$band = true;
				}else
					$band = false;
					
				$smarty->assign("json", array("band" => $band, "mensaje" => $mensaje, "orden" => $orden->id));
			break;
			case 'getOrden':
				$orden = \Conekta\Order::find($_POST['orden']);
				$smarty->assign("json", $orden);
			break;
			case 'cargarACuenta':
				try{
					$orden = \Conekta\Order::find($_POST['orden']);
					$fecha = new DateTime();
					$fecha->add(new DateInterval('P1D'));
					$charge = $orden->createCharge(
						array(
							'payment_method' => array(
								'type'       => 'card',
								'expires_at' => $fecha->getTimestamp(),
								"token_id" => $_POST['tarjeta']
							),
							'amount' => $orden->amount,
							"token_id" => $_POST['tarjeta']
						)
					);
					
					$band = true;
				}catch(Exception $e){
					$band = false;
				}
				
				$smarty->assign("json", array("band" => $band, "cargo" => $charge));
			break;
		}
	break;
}
?>