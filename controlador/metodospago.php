<?php
global $objModulo;
switch($objModulo->getId()){
	case 'metodospago':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->query("select * from metodocobro b where idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("metodosCobro", $datos);
	break;
	case 'listaMetodosPago':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select * from metodopago a join metodocobro b using(idCobro) where idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cmetodospago':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				global $userSesion;
				$obj = new TMetodoPago();
				
				$obj->setId($_POST['id']);
				$obj->cobro->setId($_POST['cobro']);
				$obj->setNombre($_POST['nombre']);
				$obj->setReferencia($_POST['referencia']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TMetodoPago($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>