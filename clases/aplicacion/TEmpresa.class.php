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
	private $marca;
	private $slogan;
	private $direccion;
	private $externo;
	private $interno;
	private $colonia;
	private $municipio;
	private $ciudad;
	private $estado;
	private $telefono;
	private $email;
	private $rfc;
	private $activo;
	public $usuarios;
	private $idPay;
	private $ultimocorte;
	private $comision;
	private $cvv;
	
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
		$sql = "select idUsuario from usuarioempresa where idEmpresa = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
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
	* Establece la marca
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMarca($val = ""){
		$this->marca = $val;
		return true;
	}
	
	/**
	* Retorna la marca
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMarca(){
		return $this->marca;
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
	* Establece el número externo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setExterno($val = ""){
		$this->externo = $val;
		return true;
	}
	
	/**
	* Retorna el número externo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getExterno(){
		return $this->externo;
	}
	
	/**
	* Establece el número interno
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setInterno($val = ""){
		$this->interno = $val;
		return true;
	}
	
	/**
	* Retorna el número interno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getInterno(){
		return $this->interno;
	}
	
	/**
	* Establece colonia
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setColonia($val = ""){
		$this->colonia = $val;
		return true;
	}
	
	/**
	* Retorna colonia
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getColonia(){
		return $this->colonia;
	}
	
	/**
	* Establece municipio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMunicipio($val = ""){
		$this->municipio = $val;
		return true;
	}
	
	/**
	* Retorna municipio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMunicipio(){
		return $this->municipio;
	}
	
	/**
	* Establece ciudad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCiudad($val = ""){
		$this->ciudad = $val;
		return true;
	}
	
	/**
	* Retorna ciudad
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCiudad(){
		return $this->ciudad;
	}
	
	/**
	* Establece estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = ""){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEstado(){
		return $this->estado;
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
	* Establece los parámetros adicionales
	*
	* @autor Hugo
	* @access public
	* @param mixed $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setParametros($val = ""){
		$this->parametros = json_encode($val);
		return true;
	}
	
	/**
	* Retorna los parametros
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getParametros(){
		try{
			return json_decode($this->parametros, true);
		}catch(Exception $e){
			return array();
		}
	}
	
	/**
	* Establece la fecha del ultimo corte
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setUltimoCorte($val = ""){
		$this->ultimocorte = $val == ''?date("Y-m-d"):$val;
		return true;
	}
	
	/**
	* Retorna la fecha del último corte
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getUltimoCorte(){
		return $this->ultimocorte;
	}
	
	/**
	* Establece la comision
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setComision($val = 5){
		$this->comision = $val;
		return true;
	}
	
	/**
	* Retorna email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getComision(){
		return $this->comision == ''?0.5:$this->comision;
	}
	
	/**
	* Establece cvv
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCVV($val = ''){
		$this->cvv = $val;
		return true;
	}
	
	/**
	* Retorna email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCVV(){
		return $this->cvv;
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
			$sql = "INSERT INTO empresa(razonsocial, ultimocorte) VALUES('".$this->getRazonSocial()."', now());";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idEmpresa = $db->insert_id;
			$this->ultimocorte = date("Y-m-d");
			#aquí se agrega todo la configuración inicial
			
			#Se crea el cliente por default
			$cliente = new TCliente;
			$cliente->setNombre("Cliente de mostrador");
			$cliente->setEmpresa($this->getId());
			$cliente->guardar();
			
			$parametros["clienteDefault"] = $cliente->getId();	
			$this->setParametros($parametros);
			$this->guardar();
			/*
			$catalogo = array(
				array("nombre" => "Terminal bancaria", "tipo" => 2), 
				array("nombre" => "Banco", "tipo" => 3), 
				array("nombre" => "Caja", "tipo" => 1), 
				array("nombre" => "Terminal Virtual", "tipo" => 4)
			);
			
			foreach($catalogo as $el){
				$mc = new TMetodoCobro;
				$mc->empresa = new TEmpresa($this->getId());
				$mc->setDestino($el['nombre']);
				$mc->setTipo($el['tipo']);
				$mc->guardar();
			}
			*/
			$catalogo = array(
				array("nombre" => "Efectivo", "tipo" => array(1)), 
				array("nombre" => "Cheque", "tipo" => array(1)), 
				array("nombre" => "Tarjeta de débito", "tipo" => array(2, 4)), 
				array("nombre" => "Tarjeta de crédito", "tipo" => array(2, 4)), 
				array("nombre" => "Transferencia", "tipo" => array(3)),
				array("nombre" => "Depósitos a cuenta", "tipo" => array(2))
			);
			
			foreach($catalogo as $el){
				$mc = new TMetodoPago;
				$mc->empresa = new TEmpresa($this->getId());
				$mc->setNombre($el['nombre']);
				
				$mc->guardar($el['tipo']);
			}
			
			
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE empresa
			SET
				razonsocial = '".$this->getRazonSocial()."',
				slogan = '".$this->getSlogan()."',
				marca = '".$this->getMarca()."',
				direccion = '".$this->getDireccion()."',
				externo = '".$this->getExterno()."',
				interno = '".$this->getInterno()."',
				colonia = '".$this->getColonia()."',
				municipio = '".$this->getMunicipio()."',
				ciudad = '".$this->getCiudad()."',
				estado = '".$this->getEstado()."',
				telefono = '".$this->getTelefono()."',
				email = '".$this->getEmail()."',
				rfc = '".$this->getRFC()."',
				activo = ".($this->getActivo() == false?0:1).",
				parametros = '".$this->parametros."',
				idPay = '".$this->idPay."',
				ultimocorte = ".($this->getUltimoCorte() == ''?"null":("'".$this->getUltimoCorte()."'")).",
				comision = ".$this->getComision().",
				cvv = '".$this->getCVV()."'
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
		$rs = $db->query("update empresa set visible = false where idEmpresa = ".$this->getId());
		
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
	
	/**
	* Genera un ID de la empresa en conekta
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setIdPay(){
		if ($this->getId() == '') return false;
		global $ini;
		require_once('librerias/openpay/Openpay.php');
		try{
			$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);
			if ($ini['openpay']['produccion'] == 'on')
				Openpay::setProductionMode(true);
				
			$cliente = $openpay->customers->add(array(
				"name" => str_replace(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"), array("uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "cero"), $this->getRazonSocial()),
				"email" => $this->getEmail(),
				"phone_number" => $this->getTelefono(),
				"external_id" => $this->getId()
			));
			
			$this->idPay = $cliente->id;
			$this->guardar();
		} catch (Exception $error){
			ErrorSistema("PAY: Ocurrió un error al registrar al cliente... ".$error->getMessage());
			return false;
		}
		
		return true;
	}
	
	/**
	* Retorna el id de cliente en conekta
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getIdPay(){
		return $this->idPay;
	}
	
	/**
	* Retorna true si la informacion de la empresa está completa
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function isCompletaInformacion(){
		$db = TBase::conectaDB();
		$rs = $db->query("select marca, direccion, telefono, externo, email, colonia, municipio, ciudad, estado, rfc from empresa a where a.idEmpresa = ".$this->getId());	
			
		$band = true;
		foreach($rs->fetch_assoc() as $key => $valor)
			if ($valor == '')
				$band = false;
				
		return $band?$this->tarjetaRegistrada():false;
	}
	
	/**
	* Retorna true si la empresa ya tiene registrada una tarjeta
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function tarjetaRegistrada(){
		require_once('librerias/openpay/Openpay.php');
		global $ini;
		$openpay = Openpay::getInstance($ini['openpay']['id'], $ini['openpay']['key_private']);
		if ($ini['openpay']['produccion'] == 'on')
				Openpay::setProductionMode(true);
			
		if ($this->getIdPay() == '')
			$this->setIdPay();
			
		try{
			$cliente = $openpay->customers->get($this->getIdPay());
			$tarjetas = $cliente->cards->getList(array());
			
			return count($tarjetas) > 0;
		}catch(Exception $e){
			ErrorSistema("PAY: ".$e->getMessage());
			return false;
		}
	}
}
?>