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
		$this->cleanFiles();
	}	
	
	public function Header($nombre){   	
    	//$this->Image('repositorio/img/logo.jpg');
    	$this->SetFont('Sans', '', 10);
    	$this->SetTextColor(255, 0, 0);
    	$y = $this->GetY();
    	$this->Ln(5);
    	$this->Cell(140, 5, "Nota de venta", 0, 0, 'C');
    	$this->SetTextColor(0, 0, 0);
    	
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
    	$this->Cell(50, 5, $this->empresa->getCiudad(), 'B');
    	$this->Cell(10, 5, "Tel: ");
    	$this->Cell(40, 5, $this->empresa->getEstado(), 'B');
    	$this->Ln(5);
    	
    	$this->Ln(5);
	}
	
	public function generar($id){
		$this->AddPage();
		
		$cotizacion = $this->cotizacion;
		$this->Ln(10);
		$this->Write(5, utf8_decode("Estimado cliente, por medio del presente, le hago entrega de la cotización que nos ha solicitado. Cualquier duda favor de contactarnos, con gusto se las resolveremos"));
		
				
		$this->SetFont('Sans', 'B', 6);
		$this->Cell(165, 8, "Cargos por servicios adicionales", 0, 0, 'R');
		
	}
	
	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(0, 10, utf8_decode('Página ').$this->PageNo(), 0, 0, 'C');
		
		$this->SetY(-30);
		$this->write(5, utf8_decode("Estos precios están sujetos a cambios sin previo aviso. La presenta aplica para cualquier forma de pago. La cotización no representa forma alguna, reserva de inventario"));
		
		$this->SetY(-55);
		$this->Cell(0, 5, "______________________________________________", 0, 1, 'C');
		global $sesion;
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
		chmod($file, 0555);
		//header('Location: temporal/'.$file);
		
		return $file;
	}
}
?>