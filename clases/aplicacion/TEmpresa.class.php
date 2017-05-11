<?php
/**
* TEmpresa
* Usuarios del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TEmpresa{
	private $idEmpresa;
	private $razonsocial;
	private $slogan;
	private $direccion;
	private $telefono;
	private $email;
	private $rfc;
	private $activo;
	public $usuarios;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TEmpresa($id = ''){
		$this->usuarios = array();
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
		$rs = $db->query("select * from empresa where idEmpresa = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val)
			$this->$field = $val;
			
		$this->getUsuarios();
		
		return true;
	}
	
	/**
	* Carga la lista de usuarios
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function getUsuarios(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("select idUsuario from usuarioempresa where idEmpresa = ".$id);
		
		$this->usuarios = array();
		while($row = $rs->fetch_assoc())
			$this->usuarios[$row['idUsuario']] = new TUsuario($row['idUsuario']);
		
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
		return $this->idEmpresa;
	}
	
	/**
	* Establece razon social
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRazonSocial($val = ""){
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
	* Establece slogan
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSlogan($val = ""){
		$this->slogan = $val;
		return true;
	}
	
	/**
	* Retorna slogan
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getSlogan(){
		return $this->slogan;
	}
	
	/**
	* Establece direccion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDireccion($val = ""){
		$this->direccion = $val;
		return true;
	}
	
	/**
	* Retorna direccion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	/**
	* Establece telefono
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ""){
		$this->telefono = $val;
		return true;
	}
	
	/**
	* Retorna telefono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Establece email
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ""){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Establece el RFC
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRFC($val = ""){
		$this->rfc = $val;
		return true;
	}
	
	/**
	* Retorna RFC
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRFC(){
		return $this->rfc;
	}
	
	/**
	* Indica si está activo o no
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setActivo($val = true){
		$this->activo = $val;
		return true;
	}
	
	/**
	* indica si está activo o no
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getActivo(){
		return $this->activo;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO empresa(razonsocial) VALUES('".$this->getRazonSocial()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idEmpresa = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE empresa
			SET
				razonsocial = '".$this->getRazonSocial()."',
				slogan = '".$this->getSlogan()."',
				direccion = '".$this->getDireccion()."',
				telefono = '".$this->getTelefono()."',
				email = '".$this->getEmail()."',
				rfc = '".$this->getRFC()."',
				activo = ".($this->getActivo() == false?0:1)."
			WHERE idEmpresa = ".$this->getId();
			
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
		$rs = $db->query("update usuario set visible = false where idUsuario = ".$this->getId());
		
		return $rs?true:false;
	}
	
	
	/**
	* Agrega un usuario a la empresa
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addUsuario($usuario = ''){
		if ($usuario == '') return false;
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$sql = "INSERT INTO usuarioempresa(idUsuario, idEmpresa) VALUES(".$usuario.", ".$this->getId().");";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if (!$rs) return false;
		$this->getUsuarios();
		return true;
	}
	
	/**
	* Quita un usuario a la empresa
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function delUsuario($usuario = ''){
		if ($usuario == '') return false;
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$sql = "delete from usuarioempresa where idUsuario = ".$usuario." and idEmpresa = ".$this->getId()."";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if (!$rs) return false;
		$this->getUsuarios();
		return true;
	}
}
?>