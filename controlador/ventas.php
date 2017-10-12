<?php
global $objModulo;
switch($objModulo->getId()){
	case 'puntoventa':
		$db = TBase::conectaDB();
		global $userSesion;
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$smarty->assign("informacionCompleta", $empresa->isCompletaInformacion());
		
		$rs = $db->query("select count(*) as total from usuario a join usuariobazar b using(idUsuario) join bazar c using(idBazar) where c.visible = true and b.idUsuario = ".$userSesion->getId());
		$row = $rs->fetch_assoc();
		
		$smarty->assign("totalBazares", $row['total'] > 0);
	
		$sql = "select * from bazar a join usuariobazar b using(idBazar) where idUsuario = ".$userSesion->getId()." and a.visible = 1 and estado = 1";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("bazares", $datos);
		
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select * from metodopago where visible = true and idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		$metodosCobro = array();
		while($row = $rs->fetch_assoc()){
			$rs2 = $db->query("select a.*, b.nombre as tipo, concat(b.nombre, ' - ', a.destino) as destino from metodocobro a join tipocobro b using(idTipoCobro) join metodopagotipocobro using(idTipoCobro) where a.visible = true and a.idEmpresa = ".$userSesion->getEmpresa()." and idMetodoPago = ".$row['idMetodoPago']);
			$datos2 = array();
			while($row2 = $rs2->fetch_assoc()){
				array_push($datos2, $row2);
				array_push($metodosCobro, $row2);
			}
			
			$row['cobros'] = json_encode($datos2);
			
			array_push($datos, $row);
		}
		$smarty->assign("metodosPago", $datos);
		$smarty->assign("metodosCobro", $metodosCobro);
		
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$parametros = $empresa->getParametros();
		$clienteDefecto = new TCliente($parametros['clienteDefault']);
		$smarty->assign("clienteDefecto", array("nombre" => $clienteDefecto->getNombre(), "idCliente" => $clienteDefecto->getId()));
		
		$smarty->assign("bazarCookie", $_GET['tipo'] == 'bazar'?$_GET['id']:$_COOKIE['bazar']);
		
		$rs = $db->query("select c.* from metodocobro a join metodopagotipocobro b using(idTipoCobro) join metodopago c using(idMetodoPago) where a.visible = true and (c.nombre = 'Efectivo' or c.nombre = 'Caja') and a.idEmpresa = ".$userSesion->getEmpresa());
		
		$smarty->assign("efectivo", $rs->num_rows == 0);
	break;
	case 'listaVentas':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select a.*, b.nombre as nombreCliente, b.correo, c.nombre as nombreEstado, c.color as colorEstado from venta a join cliente b using(idCliente) join estado c using(idEstado) where idBazar = ".$_POST['bazar']);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cventas':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TVenta();
				
				$obj->setId($_POST['id']);
				if ($_POST['id'] == ''){
					$obj->bazar = new TBazar($_POST['bazar']);
					$obj->setFolio();
				}
				
				$obj->cliente = new TCliente($_POST['cliente']);
				$obj->setFecha($_POST['fecha']);
				$obj->setComentario($_POST['comentario']);
				$obj->setDescuento($_POST['descuento'] == ''?0:$_POST['descuento']);
				
				$band = $obj->guardar();
				
				if ($band){#si se guardó el encabezado entonces se guarda el detalle
					$obj->clearDetalle();
					foreach($_POST['productos'] as $producto)
						$obj->addMovimiento($producto['idProducto'], $producto['descripcion'], $producto['cantidad'], $producto['precio'], $producto['descuento'], $producto['entregado'], json_encode($producto));
				}
				
				$smarty->assign("json", array("band" => $band, "folio" => $obj->getFolio(), "id" => $obj->getId()));
			break;
			case 'del':
				$obj = new TEmpresa($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'getProductos':
				$db = TBase::conectaDB();
				$rs = $db->query("select json from movimiento where idVenta = ".$_POST['id']);
				$datos = array();
				while($row = $rs->fetch_assoc()){
					array_push($datos, json_decode($row['json']));
				}
				
				$smarty->assign("json", $datos);
			break;
			case 'cerrar':
				$obj = new TVenta($_POST['id']);
				$obj->setEstado(2); #Esto pone la venta en estado cerrada
				$obj->setRegistro(date("Y-m-d"));
				$band = $obj->guardar();
				
				$smarty->assign("json", array("band" => $band));
			break;
			case 'cancelar':
				$obj = new TVenta($_POST['id']);
				$obj->setEstado(3); #Esto pone la venta en estado cerrada
				$band = $obj->guardar();
				
				$smarty->assign("json", array("band" => $band));
			break;
			case 'imprimir':
				require_once(getcwd()."/repositorio/pdf/ticket.php");
				$pdf = new RTicket($_POST['id']);
				$pdf->generar();
				
				$documento = $pdf->Output();
				
				$bandEmail = false;
				if ($documento <> '' and $_POST['email'] <> ''){
					global $ini;
					$email = new TMail();
					$email->setTema("Nota de venta");
					$email->addDestino($_POST['email']);
					
					$venta = new TVenta($_POST['id']);
					$datos = array();
					$datos['bazar.nombre'] = $venta->bazar->getNombre();
					$datos['venta.fecha'] = $venta->getFecha();
					$empresa = new TEmpresa($venta->bazar->getEmpresa());
					if (file_exists("repositorio/empresas/empresa".$empresa->getId().".jpg"))
						$datos['empresa.logo'] = '<img src="'.$ini['sistema']['url'].'repositorio/empresas/empresa'.$empresa->getId().'.jpg" style="width: 100px" />';
					$datos['empresa.nombre'] = $empresa->getRazonSocial();
					$datos['empresa.marca'] = $empresa->getMarca();
					$datos['empresa.direccion'] = $empresa->getDireccion()." ".$empresa->getExterno()." ".($empresa->getInterno() == ''?"":"Ext. ").$empresa->getInterno()."<br />".$empresa->getColonia()."<br />".$empresa->getMunicipio()."<br />".$empresa->getCiudad()."<br />".$empresa->getEstado();
					$datos['empresa.rfc'] = $empresa->getRFC();
					$datos['empresa.telefono'] = $empresa->getTelefono();
					$datos['empresa.email'] = $empresa->getEmail();
					
					$email->setBodyHTML($email->construyeMail(file_get_contents("repositorio/mail/notaVenta.html"), $datos));
					$email->adjuntar($documento);
					#$email->adjuntos = array();
					#array_push($email->adjuntos, array("nombre" => "Ticket de compra", "ruta" => $documento));
					
					$bandEmail = $email->send();
				}
				
				$smarty->assign("json", array("band" => true, "url" => $documento, "email" => $bandEmail));
			break;
			case 'setBazar':
				setcookie("bazar", $_POST['id']);
				
				$smarty->assign("json", array("band" => true));
			break;
		}
	break;
}
?>