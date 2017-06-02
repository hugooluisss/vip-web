TVenta = function(){
	var self = this;
	var productos = new Array();
	
	this.add = function(datos){
		self.productos.push(datos);
	}
	
	this.del = function(indice){
		delete self.productos(indice);
	}
	
	this.getTable = function(){
		var plantilla = $('<table id="tblProductos" class="table table-bordered table-hover"><thead><tr><th>Código Barras</th><th>Descripción</th><th>Cantidad</th><th>Precio</th><th></th></tr></thead><tbody></tbody></table>');
		
		$(self.productos).each(function(){
			producto = this;
			plantilla.find("tbody").append($('<tr><td>' + producto.codigoBarras + '</td></tr>'));
		});
		
		return plantilla;
	}
	
	this.getTotal = function(){
		var total = 0;
		$(self.productos).each(function(){
			producto = this;
			
			total += producto.precio;
		});
		
		return total.toFixed(2);
	}
};