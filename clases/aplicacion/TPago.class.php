<?php
/**
* TPago
* Pago
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPago{
	private $idPago;
	private $fecha;
	private $idVenta;
	public $metodo;
	private $monto;
	private $referencia;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPago($id = ''){
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
		$rs = $db->query("select * from pago where idPago = ".$id);
		
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
		return $this->idPago;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setVenta($val = ""){
		$this->idVenta = $val;
		return true;
	}
	
	/**
	* Retorna el identificador de la venta
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getVenta(){
		return $this->idVenta;
	}
		
	/**
	* Establece fecha
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ""){
		$this->fecha = $val == ''?date("Y-m-d H:i:s"):$val;
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFecha(){
		return $this->fecha== ''?date("Y-m-d H:i:s"):$this->fecha;
	}
	
	/**
	* Establece el monto
	*
	* @autor Hugo
	* @access public
	* @param float $val Valor a asignar
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
	* Establece la referencia
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setReferencia($val = ""){
		$this->referencia = $val;
		return true;
	}
	
	/**
	* Retorna la referencia
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getReferencia(){
		return $this->referencia;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getVenta() == '') return false;
		if ($this->metodo->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO pago(idMetodo, idVenta) VALUES(".$this->metodo->getId().", ".$this->getVenta().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idPago = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE pago
			SET
				idMetodo = ".$this->metodo->getId().",
				fecha = '".$this->getFecha()."',
				monto = ".$this->getMonto().",
				referencia = '".$this->getReferencia()."'
			WHERE idPago = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("update pago set visible = false where idPago = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>