<?php
/**
* TComision
* Comision
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TComision{
	private $idComision;
	private $idEmpresa;
	private $inicio;
	private $fin;
	private $registro;
	private $comision;
	private $monto;
	private $openpay_cash;
	private $tarjeta;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TComision($id = ''){
		$this->setId($id);		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("select * from comision where idComision = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val)
			$this->$field = $val;
		
		return true;
	}
		
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idComision;
	}
	
	/**
	* Establece la empresa
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmpresa($val = ""){
		$this->idEmpresa = $val;
		return true;
	}
	
	/**
	* Retorna el identificador de la empresa
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmpresa(){
		return $this->idEmpresa;
	}
		
	/**
	* Establece fecha de inicio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setInicio($val = ""){
		$this->inicio = $val == ''?date("Y-m-d H:i:s"):$val;
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getInicio(){
		return $this->inicio == ''?date("Y-m-d H:i:s"):$this->inicio;
	}
	
	/**
	* Establece fecha de fin
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFin($val = ""){
		$this->fin = $val == ''?date("Y-m-d H:i:s"):$val;
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFin(){
		return $this->fin == ''?date("Y-m-d H:i:s"):$this->fin;
	}
	
	/**
	* Establece la comision
	*
	* @autor Hugo
	* @access public
	* @param float $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setComision($val = 5){
		$this->comision = $val;
		return true;
	}
	
	/**
	* Retorna la comision
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getComision(){
		return $this->comision;
	}
	
	/**
	* Establece el monto
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMonto($val = 0){
		$this->monto = $val;
		return true;
	}
	
	/**
	* Retorna el monto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMonto(){
		return $this->monto;
	}
	
	/**
	* Establece el número de tarjeta
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTarjeta($val = ''){
		$this->tarjeta = $val;
		return true;
	}
	
	/**
	* Retorna el monto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTarjeta(){
		return $this->tarjeta;
	}
	
	
	/**
	* Retorna el identificador del pago
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCash(){
		return $this->openpay_cash;
	}
	
	
	/**
	* Realiza el cobro
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function cargar($tarjeta, $device){
		if ($this->getEmpresa() == '') return false;
		if ($tarjeta == '') return false;
		
		global $ini;
		require_once('librerias/openpay/Openpay.php');
		$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);
		$empresa = new TEmpresa($this->getEmpresa());
		$mensaje = "";
		try{
			$cliente = $openpay->customers->get($empresa->getIdPay());
			$cargo = $cliente->charges->create(array(
				'method' => 'card',
				'source_id' => $tarjeta,
				'amount' => $this->getMonto() * $this->getComision() / 100,
				'currency' => 'MXN',
				'description' => "Comisiones del ".$this->getInicio()." al ".$this->getFin(),
				'device_session_id' => $device
				)
			);
			
			$card = $cliente->cards->get($tarjeta);
			
			$this->setTarjeta($card->card_number);
			$this->openpay_cash = $cargo->id;
			$this->guardar();
			
			$band = true;
		}catch(Exception $e){
			$mensaje = $e->getMessage();
			$band = false;
		}
	
	
		return $mensaje;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getEmpresa() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO comision(idEmpresa, monto) VALUES(".$this->getEmpresa().", ".$this->getMonto().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idComision = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE comision
			SET
				inicio = '".$this->getInicio()."',
				fin = '".$this->getFin()."',
				registro = now(),
				comision = ".$this->getComision().",
				monto = ".$this->getMonto().",
				openpay_cash = '".$this->getCash()."',
				tarjeta = '".$this->getTarjeta()."'
			WHERE idComision = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
}
?>