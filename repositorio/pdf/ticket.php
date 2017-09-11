<?php
class RTicket extends tFPDF{
	private $cotizacion;
	
	public function RTicket($id){
		$this->venta = new TVenta($id);
		$this->empresa =  new TEmpresa($this->venta->bazar->getEmpresa());
		
		parent::tFPDF('P', 'mm', 'Letter');
		$this->AddFont('Sans','', 'DejaVuSans.ttf', true);
		$this->AddFont('Sans','B', 'DejaVuSans-Bold.ttf', true);
		$this->AddFont('Sans','U', 'DejaVuSans-Oblique.ttf', true);
		$this->AddFont('Sans','BU', 'DejaVuSans-BoldOblique.ttf', true);
		$this->total = 0;
		
		$this->cleanFiles();
	}	
	
	public function Header($nombre){
		$y = $this->GetY();
		if (file_exists("repositorio/empresas/empresa".$this->empresa->getId().".jpg"))
	    	$this->Image("repositorio/empresas/empresa".$this->empresa->getId().".jpg", null, 20, 35, 35);
	    else
		    $this->Image("templates/img/no-camara.jpg", null, 20, 35, 35);
		
		
		$this->SetY($y);
    	$this->SetFont('Sans', 'B', 12);
    	$this->SetTextColor(255, 0, 0);
    	$y = $this->GetY();
    	$this->Ln(5);
    	$this->Cell(0, 5, "Nota de venta", 0, 0, 'C');
    	$this->SetTextColor(0, 0, 0);
    	$this->SetFont('Sans', '', 10);
    	$this->SetXY(150, $y);
    	$this->Cell(20, 5, "# de Nota: ");
    	
    	$this->Cell(0, 5, $this->venta->getFolio(), 'B');
    	$this->SetXY(150, $y + 5);
    	$this->Cell(15, 5, "Bazar: ");
    	$this->Cell(0, 5, $this->venta->bazar->getNombre(), 'B');
    	$this->SetXY(150, $y + 10);
    	$this->Cell(15, 5, "Fecha: ");
    	$this->Cell(0, 5, $this->venta->getFecha(), 'B');
    	$this->Ln(20);
    	
    	$x = 60;
    	$this->SetX($x);
    	/*
    	$this->Cell(27, 5, "Razón Social: ");
    	$this->Cell(93, 5, $this->empresa->getRazonSocial(), 'B');
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(20, 5, "Domicilio: ");
    	$this->Cell(50, 5, $this->empresa->getDireccion(), 'B');
    	$this->Cell(10, 5, "#Ext: ");
    	$this->Cell(15, 5, $this->empresa->getExterno(), 'B');
    	$this->Cell(10, 5, "#Int: ");
    	$this->Cell(15, 5, $this->empresa->getInterno(), 'B');
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(10, 5, "Col.: ");
    	$this->Cell(50, 5, $this->empresa->getColonia(), 'B');
    	$this->Cell(20, 5, "Municipio: ");
    	$this->Cell(40, 5, $this->empresa->getMunicipio(), 'B');
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(15, 5, "Ciudad: ");
    	$this->Cell(50, 5, $this->empresa->getCiudad(), 'B');
    	$this->Cell(15, 5, "Estado: ");
    	$this->Cell(40, 5, $this->empresa->getEstado(), 'B');
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(15, 5, "RFC: ");
    	$this->Cell(40, 5, $this->empresa->getRFC(), 'B');
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(15, 5, "Correo: ");
    	$this->Cell(50, 5, $this->empresa->getEmail(), 'B');
    	$this->Cell(10, 5, "Tel: ");
    	$this->Cell(45, 5, $this->empresa->getTelefono(), 'B');
    	$this->Ln(15);
    	*/
    	$this->Cell(120, 5, $this->empresa->getRazonSocial());
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(70, 5, $this->empresa->getDireccion());
    	$this->Cell(25, 5, $this->empresa->getExterno());
    	$this->Cell(25, 5, $this->empresa->getInterno());
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(60, 5, $this->empresa->getColonia());
    	$this->Cell(60, 5, $this->empresa->getMunicipio());
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(65, 5, $this->empresa->getCiudad());
    	$this->Cell(55, 5, $this->empresa->getEstado());
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(55, 5, $this->empresa->getRFC());
    	$this->Ln(5);
    	$this->SetX($x);
    	$this->Cell(65, 5, $this->empresa->getEmail());
    	$this->Cell(55, 5, $this->empresa->getTelefono());
    	$this->Ln(15);
    	
    	#Datos del cliente
    	$this->SetFont('Sans', 'B', 10);
    	$this->Cell(140, 5, "Datos del cliente");
    	$this->SetFont('Sans', '', 10);
    	$this->Ln(10);
    	$this->Cell(18, 5, "Nombre: ");
    	$this->Cell(0, 5, $this->venta->cliente->getNombre(), 'B', 1);
    	$this->Cell(25, 5, "Razón social: ");
    	$this->Cell(0, 5, $this->venta->cliente->getRazonSocial(), 'B', 1);
    	$this->Cell(20, 5, "Domicilio: ");
    	$this->Cell(120, 5, $this->venta->cliente->getDomicilio(), 'B');
    	$this->Cell(13, 5, "#Ext: ");
    	$this->Cell(15, 5, $this->venta->cliente->getExterior(), 'B');
    	$this->Cell(13, 5, "#Int: ");
    	$this->Cell(15, 5, $this->venta->cliente->getInterior(), 'B', 1);
    	$this->Cell(16, 5, "Colonia: ");
    	$this->Cell(80, 5, $this->venta->cliente->getColonia(), 'B');
    	$this->Cell(20, 5, "Municipio: ");
    	$this->Cell(80, 5, $this->venta->cliente->getMunicipio(), 'B', 1);
    	$this->Cell(16, 5, "Ciudad: ");
    	$this->Cell(50, 5, $this->venta->cliente->getCiudad(), 'B');
    	$this->Cell(16, 5, "Estado: ");
    	$this->Cell(50, 5, $this->venta->cliente->getEstado(), 'B');
    	$this->Cell(10, 5, "RFC: ");
    	$this->Cell(55, 5, $this->venta->cliente->getRFC(), 'B', 1);
    	$this->Cell(16, 5, "Correo: ");
    	$this->Cell(50, 5, $this->venta->cliente->getCorreo(), 'B');
    	$this->Cell(10, 5, "Tel: ");
    	$this->Cell(55, 5, $this->venta->cliente->getTelefono(), 'B', 1);
    	
    	
    	$this->Ln(5);
    	#Inicio del detalle de la venta
    	$this->SetFont('Sans', '', 6);
    	$this->SetFillColor(160);
    	$y = $this->GetY();
    	$x = $this->GetX();
    	$this->SetY($y); $this->MultiCell(5, 10, "#", 0, 'C', true);
    	$x += 5;
    	$this->SetXY($x, $y); $this->MultiCell(20, 5, "Código de barras", 0, 'C', true);
    	$x += 20; $this->SetXY($x, $y); $this->MultiCell(68, 10, "Descripción", 0, 'C', true);
    	$x += 68; $this->SetXY($x, $y); $this->MultiCell(15, 10, "Cantidad", 0, 'C', true);
    	$x += 15; $this->SetXY($x, $y); $this->MultiCell(25, 10, "Precio u.", 0, 'C', true);
    	$x += 25; $this->SetXY($x, $y); $this->MultiCell(25, 10, "Descuento", 0, 'C', true);
    	$x += 25; $this->SetXY($x, $y); $this->MultiCell(25, 10, "Precio total", 0, 'C', true);
    	$x += 25; $this->SetXY($x, $y); $this->MultiCell(15, 5, "Cantidad entregada", 0, 'C', true);
	}
	
	public function generar($id){
		$this->AddPage();
		
		$this->SetFont('Sans', '', 6);
		$db = TBase::conectaDB();
		global $sesion;
		
		$rs = $db->query("select * from movimiento a where a.idVenta = ".$this->venta->getId());
		$datos = array();
		$cont = 1;
		$cantidad = 0;
		$total = 0;
		$entregados = 0;
		while($row = $rs->fetch_assoc()){
			$x = $this->GetX();
			$y = $this->GetY();
			
			if ($cont % 2 == 0)
				$this->SetFillColor(230);
			else
				$this->SetFillColor(255);
			
			$otro = json_decode($row['json']);
			$this->Cell(5, 4, "".$cont++, 0, 0, 'L', true);
			$this->Cell(20, 4, $otro->codigoBarras, 0, 0, 'L', true);
	    	$this->MultiCell(68, 4, $row['descripcion'], 0, 0, true);
	    	$linea = $this->GetY() - $y;
	    	$this->SetY($y);
	    	$this->SetX($x + 68 + 25);
	    	$this->Cell(15, 4, $row['cantidad'], 0, 0, 'R', true);
	    	$this->Cell(25, 4, number_format($row['precio'], 2, '.', ','), 0, 0, 'R', true);
	    	$this->Cell(25, 4, $row['descuento']."%", 0, 0, 'R', true);
	    	$this->Cell(25, 4, number_format($row['cantidad'] * ($row['precio'] * (1 - $row['descuento'] / 100)), 2, '.', ','), 0, 0, 'R', true);
	    	$this->Cell(15, 4, $row['entregado'], 0, 0, 'R', true);
	    	
	    	$cantidad += $row['cantidad'];
	    	$total += $row['cantidad'] * ($row['precio'] * (1 - $row['descuento'] / 100));
	    	$entregados += $row['entregado'];
	    	$this->total = $total;
	    	$this->Ln(4);
			array_push($datos, $row);
		}
		
		$this->SetFont('Sans', 'B', 6);
		$this->Cell(93, 4, "Cantidad total", 'T', 0, 'R');
		$this->Cell(15, 4, utf8_decode($cantidad), 'T', 0, 'R');
		$this->Cell(50, 4, "Precio total", 'T', 0, 'R');
		$this->Cell(25, 4, number_format($total, 2, '.', ','), 'T', 0, 'R');
		$this->Cell(15, 4, "".$entregados, 'T', 0, 'R');
	}
	
	function Footer(){
		$db = TBase::conectaDB();
		
		$rs = $db->query("select a.*, b.nombre as metodopago from pago a join metodopago b using(idMetodoPago) where a.visible = 1 and idVenta = ".$this->venta->getId()." order by fecha desc");
		$pagos = array();
		while($row = $rs->fetch_assoc())
			array_push($pagos, $row);
		
		$monto = $this->total;
		$descuento = $monto * ($this->venta->getDescuento() / 100);
		$total = $monto - $descuento;
		
		$this->SetY(-30 + count($pagos) * -5);
		$this->SetFont('Arial', 'I', 8);
		$this->SetY(-30 + count($pagos) * -5);
		$y = $this->GetY();
		$this->MultiCell(100, 5, "Comentarios: ".$this->venta->getComentario());
		$this->SetXY(140, $y);
		$this->Cell(30, 5, "Subtotal");
		$this->Cell(0, 5, number_format($monto, 2, '.', ','), 0, 0, 'R');
		$this->Ln(5); $y += 5;
		$this->SetXY(140, $y);
		$this->Cell(30, 5, "Descuento (".$this->venta->getDescuento()."%)");
		$this->Cell(0, 5, number_format($descuento, 2, '.', ','), 0, 0, 'R');
		$this->Ln(5); $y += 5;
		$this->SetXY(140, $y);
		$this->Cell(30, 5, "Total");
		$this->Cell(0, 5, number_format($total, 2, '.', ','), 0, 0, 'R');
		
		foreach($pagos as $pago){
			$y += 5;
			$this->SetXY(140, $y);
			$descripcion = $pago['metodopago'];
			if ($pago['referencia'] <> '')
				$descripcion .= " (".$pago['referencia'].")";
			$this->Cell(30, 5, utf8_decode("- ".$descripcion));
			$this->Cell(0, 5, number_format($pago['monto'], 2, '.', ','), 0, 0, 'R');
			$total -= $pago['monto'];
		}
		
		$this->SetFont('Arial', 'B', 8);
		$y += 5;
		$this->SetXY(140, $y);
		$this->Cell(30, 5, "Total pendiente");
		$this->Cell(0, 5, number_format($total, 2, '.', ','), 0, 0, 'R');
	}
	
	private function cleanFiles(){
    	$t = time();
    	$dir = "temporal";
    	$h = opendir($dir);
    	while($file=readdir($h)){
        	if(substr($file,0,3)=='tmp' && substr($file,-4)=='.pdf'){
            	$path = $dir.'/'.$file;
            	if($t-filemtime($path)>3600)
                	@unlink($path);
        	}
    	}
    	closedir($h);
	}
	
	public function Output(){
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.pdf');
		$file .= '.pdf';
		parent::Output($file, 'F');
		chmod($file, 0777);
		//header('Location: temporal/'.$file);
		
		return $file;
	}
}
?>