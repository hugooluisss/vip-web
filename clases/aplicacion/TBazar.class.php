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
	private $estado;
	private $inicio;
	
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
				inicio = '".$this->getInicio()."'
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
		$rs = $db->query("update bazar set visible = false where idEmpresa = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>