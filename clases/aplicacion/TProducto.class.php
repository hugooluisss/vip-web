<?php
/**
* TProducto
* Usuarios del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TProducto{
	private $idProducto;
	public $empresa;
	private $codigobarras;
	private $codigointerno;
	private $descripcion;
	private $color;
	private $talla;
	private $unidad;
	private $costo;
	private $descuento;
	private $precio;
	private $existencias;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TProducto($id = ''){
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
		$rs = $db->query("select * from producto where idProducto = ".$id);
		
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
		return $this->idProducto;
	}
	
	/**
	* Establece codigo de barras
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCodigoBarras($val = ""){
		$this->codigoBarras = $val;
		return true;
	}
	
	/**
	* Retorna Codigo interno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCodigoBarras(){
		return $this->codigoBarras;
	}
	
	/**
	* Establece codigo interno
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCodigoInterno($val = ""){
		$this->codigoInterno = $val;
		return true;
	}
	
	/**
	* Retorna codigo interno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCodigoInterno(){
		return $this->codigoInterno;
	}
	
	/**
	* Establece la descripción
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcion($val = ""){
		$this->descripcion = $val;
		return true;
	}
	
	/**
	* Retorna la descripción
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece el color
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setColor($val = ""){
		$this->color = $val;
		return true;
	}
	
	/**
	* Retorna color
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getColor(){
		return $this->color;
	}
	
	/**
	* Establece la talla
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTalla($val = ""){
		$this->talla = $val;
		return true;
	}
	
	/**
	* Retorna talla
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTalla(){
		return $this->talla;
	}
	
	/**
	* Establece la unidad de medida
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setUnidad($val = ""){
		$this->unidad = $val;
		return true;
	}
	
	/**
	* Retorna la unidad de medida
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getUnidad(){
		return $this->unidad;
	}
	
	/**
	* Establece el costo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCosto($val = 0){
		$this->costo = $val;
		return true;
	}
	
	/**
	* Retorna el costo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCosto(){
		return $this->costo;
	}
	
	/**
	* Establece el descuento
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescuento($val = 0){
		$this->descuento = $val;
		return true;
	}
	
	/**
	* Retorna el descuento
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescuento(){
		return $this->descuento;
	}
	
	/**
	* Establece las existencias
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setExistencias($val = 0){
		$this->existencias = $val;
		return true;
	}
	
	/**
	* Retorna el total de existencias
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getExistencias(){
		return $this->existencias;
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio($val = 0){
		$this->precio = $val;
		return true;
	}
	
	/**
	* Retorna el precio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio(){
		return $this->precio;
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
			$sql = "INSERT INTO producto(idEmpresa) VALUES('".$this->empresa->getId()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idMetodo = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE producto
			SET
				codigoBarras = '".$this->getCodigoBarras()."',
				codigoInterno = '".$this->getCodigoInterno()."',
				descripcion = '".$this->getDescripcion()."',
				color = '".$this->getColor()."',
				talla = '".$this->getTalla()."',
				unidad = '".$this->getUnidad()."',
				costo = ".$this->getCosto().",
				descuento = ".$this->getDescuento().",
				existencias = ".$this->getExistencias().",
				precio = ".$this->getPrecio().",
			WHERE idProducto = ".$this->getId();
			
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
		$sql = "update producgto set visible = false where idProducto = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>