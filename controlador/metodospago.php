<?php
global $objModulo;
switch($objModulo->getId()){
	case 'metodospago':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->query("select * from metodocobro b where visible = true and idEmpresa = ".$userSesion->getEmpresa());
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
		
		$rs = $db->query("select * from metodopago where visible = true and idEmpresa = ".$userSesion->getEmpresa());
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$rs2 = $db->query("select idMetodoCobro from cobropago where idMetodoPago = ".$row['idMetodoPago']);
			
			$row['metodosCobro'] = array();
			while($row2 = $rs2->fetch_assoc()){
				array_push($row['metodosCobro'], $row2['idMetodoCobro']);
			}
			
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
				$band = $obj->guardar();
				
				if ($band){
					$obj->removeAllCobros();
					foreach($_POST['cobros'] as $idCobro){
						$obj->addMetodoCobro($idCobro);
					}
				}
				
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