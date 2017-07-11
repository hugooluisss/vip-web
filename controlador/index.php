<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal':
		global $userSesion;
		switch($userSesion->getIdTipo()){
			case '2': #responsable
				$db = TBase::conectaDB();
				$rs = $db->query("select b.folio, a.*, c.nombre as bazar from movimiento a join venta b using(idVenta) join bazar c using(idBazar) where entregado < cantidad and idEmpresa = ".$userSesion->getEmpresa()." limit 10");
				
				$datos = array();
				
				while($row = $rs->fetch_assoc()){
					$row['json'] = json_encode($row);
					
					array_push($datos, $row);
				}
				$smarty->assign("productosSinEntregar", $datos);
				
				$rs = $db->query("select *, d.nombre as bazar from pago a join metodocobro b using(idMetodoCobro) join venta c using(idVenta) join bazar d using(idBazar) join usuariobazar e using(idBazar) where idUsuario = ".$userSesion->getId());
				
				$datos = array();
				$total = 0;
				while($row = $rs->fetch_assoc()){
					$total += $row['monto'];
					$row['monto'] = number_format($row['monto'], 2, '.', ',');
					$row['json'] = json_encode($row);
					array_push($datos, $row);
				}
				$smarty->assign("pagos", $datos);
				$smarty->assign("totalPagos", number_format($total, 2, '.', ','));
			break;
			case 3: #vendedor
				$db = TBase::conectaDB();
				global $userSesion;
				$sql = "select b.* from usuariobazar a join bazar b using(idBazar) where idUsuario = ".$userSesion->getId();
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$datos = array();
				while($row = $rs->fetch_assoc()){
					$sql = "select idVenta from venta where idBazar = ".$row['idBazar'];
					$rs2 = $db->query($sql) or errorMySQL($db, $sql);
					$row['monto'] = 0;
					$row['pagos'] = 0;
					while($row2 = $rs2->fetch_assoc()){
						$venta = new TVenta($row2['idVenta']);
						$row['monto'] += $venta->getMonto();
						
						$rs3 = $db->query("select sum(a.monto) as monto from pago a where a.visible = true and idVenta = ".$row2['idVenta']);
						$row3 = $rs3->fetch_assoc();
						$row['pagos'] += $row3['monto'];
					}
					$row['monto'] = number_format($row['monto'], 2, '.', ',');
					$row['pagos'] = number_format($row['pagos'], 2, '.', ',');
					
					$row['json'] = json_encode($row);
					
					array_push($datos, $row);
				}
				$smarty->assign("bazares", $datos);
			break;
		}
	break;
}
?>