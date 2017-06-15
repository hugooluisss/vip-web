<?php
global $objModulo;
switch($objModulo->getId()){
	case 'puntoventa':
		global $userSesion;
		$db = TBase::conectaDB();
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
		
		$rs = $db->query("select * from metodopago a where idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("metodosPago", $datos);
		
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$parametros = $empresa->getParametros();
		$clienteDefecto = new TCliente($parametros['clienteDefault']);
		$smarty->assign("clienteDefecto", array("nombre" => $clienteDefecto->getNombre(), "idCliente" => $clienteDefecto->getId()));
	break;
	case 'listaVentas':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select a.*, b.nombre as nombreCliente, c.nombre as nombreEstado, c.color as colorEstado from venta a join cliente b using(idCliente) join estado c using(idEstado) where idBazar = ".$_POST['bazar']);
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
				$obj->setDescuento($_POST['descuento']);
				
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
		}
	break;
}
?>