<?php
/**
* TMetodoPago
* Usuarios del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TMetodoPago{
	private $idMetodo;
	public $empresa;
	private $nombre;
	private $referencia;
	private $devoluciones;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TMetodoPago($id = ''){
		$this->empresa = new TEmpresa;
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
		$rs = $db->query("select * from metodopago where idMetodo = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idEmpresa':
					$this->empresa = new TEmpresa($val);
				break;
				default:
					$this->$field = $val;
				break;
			}
		}
		
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
		return $this->idMetodo;
	}
	
	/**
	* Establece nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ""){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna razon social
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
		
	/**
	* Establece si debe de existir referencia
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setReferencia($val = 0){
		$this->referencia = $val;
		return true;
	}
	
	/**
	* Retorna si se requiere referencia
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getReferencia(){
		return $this->referencia;
	}
	
	/**
	* Establece si hay devoluciones
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDevoluciones($val = 1){
		$this->devoluciones = $val;
		return true;
	}
	
	/**
	* Retorna si se permiten las devoluciones
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDevoluciones(){
		return $this->devoluciones;
	}

	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->empresa->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO metodopago(idEmpresa) VALUES('".$this->empresa->getId()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idMetodo = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE metodopago
			SET
				nombre = '".$this->getNombre()."',
				referencia = ".$this->getReferencia().",
				devoluciones = ".$this->getDevoluciones()."
			WHERE idMetodo = ".$this->getId();
			
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
		$sql = "delete from metodopago where idMetodo = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>