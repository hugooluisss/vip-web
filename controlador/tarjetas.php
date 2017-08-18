<?php
require_once("librerias/conekta/Conekta.php");
\Conekta\Conekta::setApiKey($ini['conekta']['key_private']);
\Conekta\Conekta::setLocale('es');
\Conekta\Conekta::setApiVersion("2.0.0");
		
global $objModulo;
switch($objModulo->getId()){
	case 'tarjetas':
		global $ini;
		$smarty->assign("year", date("Y"));
		$smarty->assign("public_conekta", $ini["conekta"]["key_public"]);
	break;
	case 'listaTarjetas':
		global $userSesion;
		$empresa = new TEmpresa($userSesion->getEmpresa());
		$datos = array();
		if ($empresa->getIdConekta() <> ''){
			$customer = \Conekta\Customer::find($empresa->getIdConekta());
			foreach($customer->payment_sources->params["data"] as $key => $tarjeta){
				$tarjeta['idConekta'] = $key;
				array_push($datos, $tarjeta);
			}
		}
		//print_r($datos);
		$smarty->assign("lista", $datos);
	break;
	case 'ctarjetas':
		switch($objModulo->getAction()){
			case 'add':
				global $userSesion;
				$empresa = new TEmpresa($userSesion->getEmpresa());
				$datos = array();
				if ($empresa->getIdConekta() == ''){
					$empresa->setClienteConekta();
				}
				
				if ($empresa->getIdConekta() <> ''){
					$customer = \Conekta\Customer::find($empresa->getIdConekta());
					$source = $customer->createPaymentSource(array(
						'token_id' => $_POST['token'],
						'type'     => 'card'
					));
					
					$band = true;
				}else
					$band = false;
					
				$smarty->assign("json", array("band" => $band));
			break;
			case 'del':
				global $userSesion;
				$empresa = new TEmpresa($userSesion->getEmpresa());
				$datos = array();
				if ($empresa->getIdConekta() == ''){
					$empresa->setClienteConekta();
				}
				
				if ($empresa->getIdConekta() <> ''){
					$customer = \Conekta\Customer::find($empresa->getIdConekta());
					$source = $customer->payment_sources[$_POST['id']]->delete();
					
					$band = true;
				}else
					$band = false;
					
				$smarty->assign("json", array("band" => $band));
			break;
		}
	break;
}
?>