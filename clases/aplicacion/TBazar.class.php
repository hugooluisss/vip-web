<?php
/**
* TBazar
* Bazares
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TBazar{
	private $idBazar;
	private $idEmpresa;
	private $nombre;
	private $estado;
	private $folio;
	private $inicial;
	private $inicio;
	private $fin;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TBazar($id = ''){
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
		$rs = $db->query("select * from bazar where idBazar = ".$id);
		
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
		return $this->idBazar;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = 1){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna razon social
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEstado(){
		return $this->estado;
	}
		
	/**
	* Establece la fecha de inicio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setInicio($val = ""){
		$this->inicio = $val == ''?date("Y-m-d"):$val;
		return true;
	}
	
	/**
	* Retorna el inicio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getInicio(){
		return $this->inicio;
	}
	
	/**
	* Establece la fecha de fin
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFin($val = ""){
		$this->fin = $val == ''?date("Y-m-d"):$val;
		return true;
	}
	
	/**
	* Retorna el fin
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFin(){
		return $this->fin;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ""){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el identificador de la empresa
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
	* Establece el número de folio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFolio($val = 0){
		$this->folio = $val;
		return true;
	}
	
	/**
	* Retorna el folio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFolio(){
		return $this->folio == ''?0:$this->folio;
	}
	
	/**
	* Establece la inicial para los folios
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setInicial($val = ""){
		$this->inicial = $val;
		return true;
	}
	
	/**
	* Retorna el identificador de la empresa
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getInicial(){
		return $this->inicial;
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
			$sql = "INSERT INTO bazar(idEmpresa) VALUES(".$this->getEmpresa().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idBazar = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
			
		$sql = "UPDATE bazar
			SET
				estado = ".$this->getEstado().",
				nombre = '".$this->getNombre()."',
				inicio = '".$this->getInicio()."',
				fin = '".$this->getFin()."',
				folio = ".$this->getFolio().",
				inicial = '".$this->getInicial()."'
			WHERE idBazar = ".$this->getId();
			
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
		$rs = $db->query("update bazar set visible = false where idBazar = ".$this->getId());
		
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
		
		$sql = "INSERT INTO usuariobazar(idUsuario, idBazar) VALUES(".$usuario.", ".$this->getId().");";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if (!$rs) return false;
		#$this->getUsuarios();
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
		
		$sql = "delete from usuariobazar where idUsuario = ".$usuario." and idBazar = ".$this->getId()."";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if (!$rs) return false;
		#$this->getUsuarios();
		return true;
	}
	
	/**
	* Retorna el siguiente folio
	*
	* @autor Hugo
	* @access public
	* @param booleand $establecer false Si este es true entonces se guarda el siguiente folio
	* @return boolean True si se realizó sin problemas
	*/
	
	public function getNextFolio($establecer = false){
		if ($this->getId() == '') return false;
		
		$this->folio++;
		
		if ($establecer){
			if (!$this->guardar()) return false;
		}
		
		return $this->getFolio();
	}
}
?>