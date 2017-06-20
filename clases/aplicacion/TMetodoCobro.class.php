<?php
/**
* TMetodoCobro
* Definición de metodos de cobros
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TMetodoCobro{
	private $idCobro;
	public $empresa;
	private $tipo;
	private $destino;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TMetodoCobro($id = ''){
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
		$rs = $db->query("select * from metodocobro where idCobro = ".$id);
		
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
		return $this->idCobro;
	}
	
	/**
	* Establece el tipo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTipo($val = ""){
		$this->tipo = $val;
		return true;
	}
	
	/**
	* Retorna el tipo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTipo(){
		return $this->tipo;
	}
		
	/**
	* Establece el destino
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDestino($val = ""){
		$this->destino = $val;
		return true;
	}
	
	/**
	* Retorna el destino
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDestino(){
		return $this->destino;
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
			$sql = "INSERT INTO metodocobro(idEmpresa) VALUES('".$this->empresa->getId()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idCobro = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE metodocobro
			SET
				tipo = '".$this->getTipo()."',
				destino = '".$this->getDestino()."'
			WHERE idCobro = ".$this->getId();
			
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
		$sql = "delete from metodocobro where idCobro = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>