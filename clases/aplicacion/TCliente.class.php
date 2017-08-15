<?php
/**
* TCliente
* Cliente del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TCliente{
	private $idCliente;
	private $idEmpresa;
	private $nombre;
	private $razonsocial;
	private $domicilio;
	private $exterior;
	private $interior;
	private $colonia;
	private $municipio;
	private $ciudad;
	private $estado;
	private $rfc;
	private $correo;
	private $telefono;
	private $promociones;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TCliente($id = ''){
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
		$rs = $db->query("select * from cliente where idCliente = ".$id);
		
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
		return $this->idCliente;
	}
	
	/**
	* Establece la empresa
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmpresa($val = ''){
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
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRazonSocial($val = ''){
		$this->razonsocial = $val;
		return true;
	}
	
	/**
	* Retorna razon social
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRazonSocial(){
		return $this->razonsocial;
	}
	
	/**
	* Establece el domicilio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDomicilio($val = ''){
		$this->domicilio = $val;
		return true;
	}
	
	/**
	* Retorna domicilio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDomicilio(){
		return $this->domicilio;
	}
	
	/**
	* Establece el número exterior
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setExterior($val = 'SN'){
		$this->exterior = $val;
		return true;
	}
	
	/**
	* Retorna el número exterior
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getExterior(){
		return $this->exterior;
	}
	
	/**
	* Establece el número interior
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setInterior($val = 'SN'){
		$this->interior = $val;
		return true;
	}
	
	/**
	* Retorna el número interior
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getInterior(){
		return $this->interior;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setColonia($val = ''){
		$this->colonia = $val;
		return true;
	}
	
	/**
	* Retorna la colonia
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getColonia(){
		return $this->colonia;
	}
	
	/**
	* Establece el municipio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMunicipio($val = 1){
		$this->municipio = $val;
		return true;
	}
	
	/**
	* Retorna el nombre del municipio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMunicipio(){
		return $this->municipio;
	}
	
	/**
	* Establece la ciudad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCiudad($val = ''){
		$this->ciudad = $val;
		return true;
	}
	
	/**
	* Retorna la ciudad
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCiudad(){
		return $this->ciudad;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = ''){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEstado(){
		return $this->estado;
	}
	
	/**
	* Establece el rfc
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRFC($val = ''){
		$this->rfc = $val;
		return true;
	}
	
	/**
	* Retorna razon social
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRFC(){
		return $this->rfc;
	}
	
	/**
	* Establece el correo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCorreo($val = ''){
		$this->correo = $val;
		return true;
	}
	
	/**
	* Retorna el correo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCorreo(){
		return $this->correo;
	}
	
	/**
	* Establece el telefono
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ''){
		$this->telefono = $val;
		return true;
	}
	
	/**
	* Retorna el telefono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Establece si acepta recibir promociones
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPromociones($val = 1){
		$this->promociones = $val;
		return true;
	}
	
	/**
	* Retorna si acepta el recibir promociones
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPromociones(){
		return $this->promociones == ''?0:$this->promociones;
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
			$sql = "INSERT INTO cliente(idEmpresa) VALUES(".$this->getEmpresa().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idCliente = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE cliente
			SET
				nombre = '".$this->getNombre()."',
				razonsocial = '".$this->getRazonSocial()."',
				domicilio = '".$this->getDomicilio()."',
				exterior = '".$this->getExterior()."',
				interior = '".$this->getInterior()."',
				colonia = '".$this->getColonia()."',
				municipio = '".$this->getMunicipio()."',
				ciudad = '".$this->getCiudad()."',
				estado = '".$this->getEstado()."',
				rfc = '".$this->getRFC()."',
				correo = '".$this->getCorreo()."',
				telefono = '".$this->getTelefono()."',
				promociones = ".$this->getPromociones()."
			WHERE idCliente = ".$this->getId();
			
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
		$rs = $db->query("update cliente set visible = false where idCliente = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>