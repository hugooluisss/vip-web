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
		$smarty->assign("select", $_POST['select']);
	break;
	case 'productosImportar':
		$data = new Spreadsheet_Excel_Reader();

		$data->setOutputEncoding('CP1251');
		$data->read($_POST['archivo']);
		$hoja = $data->sheets[0];
		$datos = array();
		$campos = array(
			1 => "codigoBarras",
			2 => "codigoInterno",
			3 => "descripcion",
			4 => "color",
			5 => "talla",
			6 => "unidad",
			7 => "costo",
			8 => "descuento",
			9 => "existencias",
			10 => "precio"
		);
		
		for($j = 6 ; $j <= max(array_keys($hoja['cells'])) ; $j++){
			if (count($hoja['cells'][$j]) > 0){
				$aux = array();
				foreach($hoja['cells'][$j] as $key => $val)
					$aux[$campos[$key]] = $val;
					
				array_push($datos, $aux);
			}
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("json", json_encode($datos));
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
			case 'exportar':
				include_once("repositorio/excel/exportarInventario.php");
				$db = TBase::conectaDB();
				
				$rs = $db->query("select * from producto a where idBazar = ".$_POST['bazar']." and visible = true");
				$datos = array();
				while($row = $rs->fetch_assoc())
					array_push($datos, $row);
				
				$obj = new RInventario($_POST['bazar']);
				$obj->generar($datos);
					
				$smarty->assign("json", array("archivo" => $obj->output()));
			break;
			case 'uploadfile':
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
					$ext = explode(".", $_FILES['upl']['name']);
					if (strtolower($ext[count($ext) -1]) == 'xls'){
						if(move_uploaded_file($_FILES['upl']['tmp_name'], "temporal/".$_FILES['upl']['name'])){
							chmod("temporal/".$_FILES['upl']['name'], 0755);
							echo json_encode(array("status" => true, "ruta" => "temporal/".$_FILES['upl']['name']));
							exit;
						}
					}
				}
				
				echo json_encode(array("status" => false));
			break;
			case 'importar':
				$productos = json_decode($_POST['productos']);
				$db = TBase::conectaDB();
				$cont = 0;
				foreach($productos as $producto){
					$sql = "select * from producto where idBazar = ".$_POST['bazar']." and codigoBarras = ".$producto->codigoBarras;
					$rs = $db->query($sql);
					$row = $rs->fetch_assoc();
					$obj = new TProducto($row['idProducto']);
				
					//$obj->setId($producto['id']);
					$obj->setBazar($_POST['bazar']);
					$obj->setCodigoBarras($producto->codigoBarras);
					$obj->setCodigoInterno($producto->codigoInterno);
					$obj->setDescripcion($producto->descripcion);
					$obj->setColor($producto->color);
					$obj->setTalla($producto->talla);
					$obj->setUnidad($producto->unidad);
					$obj->setCosto($producto->costo);
					$obj->setDescuento($producto->descuento);
					$obj->setExistencias($producto->existencias);
					$obj->setPrecio($producto->precio);
					
					$cont += $obj->guardar()?1:0;
				}
				
				$smarty->assign("json", array("band" => true, "importados" => $cont));
			break;
		}
	break;
}
?>