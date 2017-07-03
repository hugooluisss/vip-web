<?php
global $objModulo;
switch($objModulo->getId()){
	case 'controlinventario':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$smarty->assign("bazar", $_GET['id']);
		
		$rs = $db->query("select * from bazar a where a.visible = true and idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("bazares", $datos);
		
		$rs = $db->query("select * from tipooperacion a ");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("tipos", $datos);
	break;
	case 'listaOperaciones':
		$db = TBase::conectaDB();
		$rs = $db->query("select * from operacion a join producto b using(idProducto) where a.visible = true and idTipo = ".$_POST['tipo']." and b.idBazar = ".$_POST['bazar']);
		
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("operaciones", $datos);
	break;
	case 'coperaciones':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TOperacion();
				
				$obj->producto->setId($_POST['producto']);
				$obj->setCantidad($_POST['cantidad']);
				$obj->setTipo($_POST['tipo']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TOperacion($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'setCantidad':
				$obj = new TOperacion($_POST['id']);
				$obj->setCantidad($_POST['cantidad']);
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
		}
	break;
}
?>