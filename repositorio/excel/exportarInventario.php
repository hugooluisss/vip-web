<?php
require_once('Spreadsheet/Excel/Writer.php');

class RInventario{
	private $libro;
	
	public function RInventario($idBazar){
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.xls');
		$file .= '.xls';		
		
		$this->libro = new Spreadsheet_Excel_Writer($file);
		$this->file = $file;
		$this->bazar = new TBazar($idBazar);
	}
	
	function generar($datos){
		$hoja = & $this->libro->addWorksheet("Productos");
		$y = 4;
		$negrita = &$this->libro->addFormat();
		$negrita->setBold();
		$negrita->setAlign("merge");
		
		$hoja->write(1, 0, utf8_decode("Inventario del bazar generado: ".date("Y-m-d")), $negrita);
		
		$hoja->write($y, 0, utf8_decode("Código Barras"), $negrita);
		$hoja->write($y, 1, utf8_decode("Código Interno"), $negrita);
		$hoja->write($y, 2, utf8_decode("Descripción"), $negrita);
		$hoja->write($y, 3, utf8_decode("Color"), $negrita);
		$hoja->write($y, 4, utf8_decode("Talla"), $negrita);
		$hoja->write($y, 5, utf8_decode("Unidad"), $negrita);
		$hoja->write($y, 6, utf8_decode("Descuento"), $negrita);
		$hoja->write($y, 7, utf8_decode("Existencias"), $negrita);
		$hoja->write($y, 8, utf8_decode("Precio"), $negrita);
		$y++;
		
		foreach($datos as $producto){
			$hoja->write($y, 0, utf8_decode($producto['codigoBarras']));
			$hoja->write($y, 1, utf8_decode($producto['codigoInterno']));
			$hoja->write($y, 2, utf8_decode($producto['descripcion']));
			$hoja->write($y, 3, utf8_decode($producto['color']));
			$hoja->write($y, 4, utf8_decode($producto['talla']));
			$hoja->write($y, 5, utf8_decode($producto['unidad']));
			$hoja->write($y, 6, utf8_decode($producto['descuento']));
			$hoja->write($y, 7, utf8_decode($producto['existencias']));
			$hoja->write($y, 8, utf8_decode($producto['precio']));
			
			$y++;
		}
	}
	
	public function output(){
		$this->libro->close();
		chmod($this->file, 0777);
		return $this->file;
	}
}