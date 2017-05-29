<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaProductos':
		$db = TBase::conectaDB();
		global $sesion;
		
		$rs = $db->query("select * from producto a where a.visible = true and idBazar = ".$_POST['bazar']);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cproductos':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				$db = TBase::conectaDB();
				$obj = new TProducto();
				
				$obj->setId($_POST['id']);
				$obj->setBazar($_POST['bazar']);
				$obj->setCodigoBarras($_POST['codigoBarras']);
				$obj->setCodigoInterno($_POST['codigoInterno']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setColor($_POST['color']);
				$obj->setTalla($_POST['talla']);
				$obj->setUnidad($_POST['unidad']);
				$obj->setCosto($_POST['costo']);
				$obj->setDescuento($_POST['descuento']);
				$obj->setExistencias($_POST['existencias']);
				$obj->setPrecio($_POST['precio']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TProducto($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>