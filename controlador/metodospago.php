<?php
global $objModulo;
switch($objModulo->getId()){
	case 'metodospago':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->query("select * from tipocobro b");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("tipos", $datos);
	break;
	case 'listaMetodosPago':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select a.*, b.nombre as nombrecobro from metodopago a join tipocobro b using(idTipoCobro) where visible = true and a.idEmpresa = ".$userSesion->getEmpresa());
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
				if ($_POST['id'] == '')
					$obj->empresa->setId($userSesion->getEmpresa());
					
				$obj->setNombre($_POST['nombre']);
				$obj->setTipoCobro($_POST['cobros']);
				$band = $obj->guardar();
				
				$smarty->assign("json", array("band" => $band));
			break;
			case 'del':
				$obj = new TMetodoPago($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>