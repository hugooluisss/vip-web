<?php
global $objModulo;
switch($objModulo->getId()){
	case 'reporteventas':
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
		
		$sql = "select * from estado";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("estados", $datos);

	break;
	case 'listaReporteVentas':
		$db = TBase::conectaDB();
		
		if ($_POST['bazar'] == ''){
			global $userSesion;
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, c.nombre as cliente from venta a join bazar b using(idBazar) join cliente c using(idCliente) where b.idEmpresa = ".$userSesion->getEmpresa()." and b.visible = 1 and a.idEstado = ".$_POST['estado']." and a.fecha between '".$_POST['inicio']."' and '".$_POST['fin']."' order by fecha desc";
		}else
			$sql = "select a.idVenta, fecha, a.folio, b.nombre as bazar, c.nombre as cliente from venta a join bazar b using(idBazar) join cliente c using(idCliente) where a.idBazar = ".$_POST['bazar']." and b.visible = 1 and a.idEstado = ".$_POST['estado']." order by fecha desc;";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			$sql = "select sum(precio * cantidad * (1-descuento/100)) as total from movimiento where idVenta = ".$row['idVenta'];
			
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			$row['total'] = $row2['total'] * (1 - $row['descuento'] / 100);
			$row['total'] = number_format($row['total'], 2, '.', ',');
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("bazar", $_POST['bazar']);
	break;
}
?>