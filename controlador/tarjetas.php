<?php
require_once('librerias/openpay/Openpay.php');
$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);
		
global $objModulo;
switch($objModulo->getId()){
	case 'tarjetas':
		global $ini;
		$smarty->assign("year", date("Y"));
		$smarty->assign("public_key", $ini["openpay"]["key_public"]);
		$smarty->assign("merchant", $ini["openpay"]["id"]);
	break;
	case 'listaTarjetas': case 'jsonTarjetas':
		if ($_POST['empresa'] <> '')
			$empresa = new TEmpresa($_POST['empresa']);
		else{
			global $userSesion;
			$empresa = new TEmpresa($userSesion->getEmpresa());
		}
		$datos = array();
		$json = array();
		
		if ($empresa->getIdPay() == ''){
			$empresa->setIdPay();
		}
		
		try{
			$cliente = $openpay->customers->get($empresa->getIdPay());
			$tarjetas = $cliente->cards->getList(array());
		}catch(Exception $e){
			ErrorSistema("PAY: ".$e->getMessage());
		}
		
		foreach($tarjetas as $tarjeta){
			//$tarjeta->id = $key;
			array_push($datos, $tarjeta);
			
			$array = array(
				"id" => $tarjeta->id,
				"brand" => $tarjeta->brand,
				"card_number" => $tarjeta->card_number
			);
			
			array_push($json, $array);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $json);
	break;
	case 'ctarjetas':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				if ($_POST['empresa'] <> '')
					$empresa = new TEmpresa($_POST['empresa']);
				else
					$empresa = new TEmpresa($userSesion->getEmpresa());
				
				$datos = array();
				if ($empresa->getIdPay() == '')
					$empresa->setIdPay();
				
				if ($empresa->getIdPay() <> ''){
					$cardDataRequest = array(
						'holder_name' => $_POST['tarjetahabiente'],
						'card_number' => $_POST['numero'],
						'cvv2' => $_POST['cvc'],
						'expiration_month' => $_POST['mes'],
						'expiration_year' => $_POST['anio'][2].$_POST['anio'][3]);
					
					try{
						$customer = $openpay->customers->get($empresa->getIdPay());
						
						#primero borramos las tarjetas
						$tarjetas = $customer->cards->getList(array());
						foreach($tarjetas as $card)
							$card->delete();
						
						$card = $customer->cards->add($cardDataRequest);
						$band = true;
					}catch(Exception $e){
						ErrorSistema("PAY: ".$e->getMessage());
						$mensaje = $e->getMessage();
						$band = false;
					}
				}else
					$band = false;
					
				$smarty->assign("json", array("band" => $band, "mensaje" => $mensaje));
			break;
			case 'del':
				global $userSesion;
				$empresa = new TEmpresa($userSesion->getEmpresa());
				$datos = array();
				if ($empresa->getIdPay() == ''){
					$empresa->getIdPay();
				}
				
				if ($empresa->getIdPay() <> ''){
					try{
						$customer = $openpay->customers->get($empresa->getIdPay());
						$card = $customer->cards->get($_POST['id']);
						$card->delete();
						$band = true;
					}catch(Exception $e){
						ErrorSistema("PAY: ".$e->getMessage());
						$mensaje = $e->getMessage();
						$band = false;
					}
				}else
					$band = false;
					
				$smarty->assign("json", array("band" => $band, "mensaje" => $mensaje));
			break;
		}
	break;
}
?>