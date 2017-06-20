<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaMetodosCobro':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->query("select * from metodocobro a where idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cmetodoscobro':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				$obj = new TMetodoCobro();
				
				$obj->setId($_POST['id']);
				if ($_POST['id'] == '')
					$obj->empresa->setId($userSesion->getEmpresa());
					
				$obj->setTipo($_POST['tipo']);
				$obj->setDestino($_POST['destino']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TMetodoCobro($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>