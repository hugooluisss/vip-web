<?php
/**
* TOperacion
* Operaciones que afectan el inventario
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TOperacion{
	private $idOperacion;
	private $idTipo;
	public $producto;
	private $fecha;
	private $cantidad;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TOperacion($id = ''){
		$this->producto = new TProducto;
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
		$rs = $db->query("select * from operacion where idOperacion = ".$id);
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idProducto':
					$this->producto = new TProducto($val);
				break;
				default: 
					$this->$field = $val;
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
		return $this->idOperacion;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ''){
		$this->fecha = $val == ''?date('Y-m-d H:i:s'):'';
		
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
		if ($this->fecha =='')
			$this->setFecha("");
			
		return $this->fecha;
	}
		
	/**
	* Establece el tipo de operacion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTipo($val = 1){
		$this->idTipo = $val;
		return true;
	}
	
	/**
	* Retorna el identificador del tipo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTipo(){
		return $this->idTipo;
	}
	
	/**
	* Establece la cantidad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCantidad($val = 1){
		$this->cantidad = $val == ''?1:$val;
		return true;
	}
	
	/**
	* Retorna la cantidad
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCantidad(){
		return $this->cantidad;
	}
	
	/**
	* Retorna el operador
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getOperador(){
		if ($this->getTipo() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "select * from tipooperador where idTipo = ".$this->getTipo();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$row = $rs->fetch_assocc();
		
		return $row['operador'];
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->producto->getId() == '') return false;
		if ($this->getTipo() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO operacion(idProducto, idTipo, fecha) VALUES(".$this->producto->getId().", ".$this->getTipo().", now());";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idOperacion = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE operacion
			SET
				cantidad = ".$this->getCantidad()."
			WHERE idOperacion = ".$this->getId();
			
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
		$rs = $db->query("update operacion set visible = false where idOperacion = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>