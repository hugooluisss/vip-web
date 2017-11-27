<?php
global $objModulo;
switch($objModulo->getId()){
	case 'productos':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$smarty->assign("informacionCompleta", $empresa->isCompletaInformacion());
		
		$rs = $db->query("select count(*) as total from usuario a join usuariobazar b using(idUsuario) where b.idUsuario = ".$userSesion->getId());
		$row = $rs->fetch_assoc();
		
		$smarty->assign("totalBazares", $row['total'] > 0);
	break;
	case 'listaProductos':
		$db = TBase::conectaDB();
		global $sesion;
		$datos = array();
		
		if ($_POST['bazar'] <> ''){
			$rs = $db->query("select * from producto a where a.visible = true and idBazar = ".$_POST['bazar']);
			$datos = array();
			while($row = $rs->fetch_assoc()){
				$obj = new TProducto($row['idProducto']);
				$row['inventario'] = $obj->getInventarioDisponible();
				
				$row['json'] = json_encode($row);
				
				array_push($datos, $row);
			}
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("select", $_POST['select']);
		$smarty->assign("json", $datos);
	break;
	case 'listaProductosAutocomplete':
		$db = TBase::conectaDB();
		global $sesion;
		
		$rs = $db->query("select codigoBarras, descripcion, color, talla, idProducto, precio, descuento from producto a where a.visible = true and idBazar = ".$_GET['bazar']." and (descripcion like '%".$_GET['term']."%' or codigoBarras like '%".$_GET['term']."%' or codigoInterno like '%".$_GET['term']."%')");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$aux = array();
			
			$obj = new TProducto($row['idProducto']);
			$row['inventario'] = $obj->getInventarioDisponible();
			
			$aux["label"] = $row['descripcion'].' '.$row['color'].' '.$row['talla'];
			$aux['identificador'] = $row['idProducto'];
			$aux['value'] = " ";
			$aux['json'] = json_encode($row);
			
			array_push($datos, $aux);
		}
		$smarty->assign("json", $datos);
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
			#7 => "costo",
			7 => "descuento",
			8 => "existencias",
			9 => "precio",
			10 => "observacion"
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
				$obj->setMarca($_POST['marca']);
				$obj->setObservacion($_POST['observacion']);
				
				$band = $obj->guardar();
				if($_POST['eliminar'] != 'false' and $band)
					$obj->eliminar();
				
				$smarty->assign("json", array("band" => $band, "id" => $obj->getId()));
			break;
			case 'del':
				$obj = new TProducto($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'exportar':
				include_once("repositorio/excel/exportarInventario.php");
				$datos = array();
				if (!isset($_POST['limpio'])){
					$db = TBase::conectaDB();
					$rs = $db->query("select * from producto a where idBazar = ".$_POST['bazar']." and visible = true");
					
					while($row = $rs->fetch_assoc()){
						unset($row['costo']);
						array_push($datos, $row);
					}
				}
				
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
					$sql = "select * from producto where idBazar = ".$_POST['bazar']." and codigoBarras = '".$producto->codigoBarras."'";
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
					//$obj->setCosto($producto->costo);
					$obj->setDescuento($producto->descuento);
					$obj->setExistencias($producto->existencias);
					$obj->setPrecio($producto->precio);
					$obj->setObservacion($producto->observacion);
					
					$cont += $obj->guardar()?1:0;
				}
				
				$smarty->assign("json", array("band" => true, "importados" => $cont));
			break;
			case 'get':
				$db = TBase::conectaDB();
				$sql = "select * from producto where idBazar = ".$_POST['bazar']." and codigoBarras = '".$_POST['codigo']."'";
				$rs = $db->query($sql);
				$row = $rs->fetch_assoc();
				
				$row["band"] = false;
				if ($row['idProducto'] <> ''){
					$row["band"] = true;
					$obj = new TProducto($row['idProducto']);
					$row['inventario'] = $obj->getInventarioDisponible();
				}
				
				$smarty->assign("json", $row);
			break;
		}
	break;
}
?>