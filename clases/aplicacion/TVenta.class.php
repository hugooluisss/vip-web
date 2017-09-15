<?php
/**
* TVenta
* Venta
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TVenta{
	private $idVenta;
	public $bazar;
	public $cliente;
	private $fecha;
	private $folio;
	private $comentario;
	private $descuento;
	private $idEstado;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TVenta($id = ''){
		$this->bazar = new TBazar;
		$this->cliente = new TCliente;
		$this->estado = 1;
		
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
		$rs = $db->query("select * from venta where idVenta = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idBazar':
					$this->bazar = new TBazar($val);
				break;
				case 'idCliente':
					$this->cliente = new TCliente($val);
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
		return $this->idVenta;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ""){
		$this->fecha = $val == ''?date("Y-m-d"):$val;
		
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
		return $this->fecha;
	}
		
	/**
	* Establece el folio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFolio($val = ""){
		if ($val == ''){
			if ($this->bazar->getId() == '') return false;
			
			$this->folio = $this->bazar->getInicial()."-".sprintf("%08s", $this->bazar->getNextFolio(true));
		}else
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
		return $this->folio;
	}
	
	/**
	* Establece el comentartio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setComentario($val = ""){
		$this->comentario = $val;
		return true;
	}
	
	/**
	* Retorna el comentario
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getComentario(){
		return $this->comentario;
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
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->bazar->getId() == '') return false;
		if ($this->cliente->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO venta(idBazar, idCliente, idEstado) VALUES(".$this->bazar->getId().", ".$this->cliente->getId().", ".$this->getEstado().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idVenta = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE venta
			SET
				idCliente = ".$this->cliente->getId().",
				fecha = '".$this->getFecha()."',
				folio = '".$this->getFolio()."',
				comentario = '".$this->getComentario()."',
				descuento = ".$this->getDescuento().",
				idEstado = ".$this->getEstado()."
			WHERE idVenta = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
	
	/**
	* Limpia el detalle de movimientos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function clearDetalle(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "delete from movimiento where idVenta = ".$this->getId().";";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
	
	/**
	* Agrega el movimiento
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addMovimiento($idProducto = "", $descripcion = "", $cantidad = 0, $precio = 0, $descuento = '', $entregado = '', $json = ''){
		if ($this->getId() == '') return false;
		$descuento = $descuento == ''?0:$descuento;
		$precio = $precio == ''?0:$precio;
		$entregado = $entregado == ''?0:$entregado;
		
		$db = TBase::conectaDB();
		$sql = "insert into movimiento(idVenta, idProducto, descripcion, cantidad, precio, descuento, entregado, json) values (".$this->getId().", ".$idProducto.", '".$descripcion."', ".$cantidad.", ".$precio.", ".$descuento.", ".$entregado.", '".$json."')";
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
		$rs = $db->query("update venta set visible = false where idVenta = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Retorna el monto de la venta
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function getMonto(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "select descuento from venta where idVenta = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$row = $rs->fetch_assoc();
		
		$sql = "select * from movimiento where idVenta = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$total = 0;
		while($rowMov = $rs->fetch_assoc()){
			$total += $rowMov['precio'] * $rowMov['cantidad'] * (1-$rowMov['descuento']/100);
		}
		
		return $total * (1-$row['descuento'] / 100);
	}
}
?>