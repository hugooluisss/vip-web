TVenta = function(){
	var self = this;
	this.productos = new Array();
	this.total = 0;
	
	this.add = function(datos){
		datos.cantidad = 1;
		datos.entregado = 0;
		self.productos.push(datos);
	}
	
	this.del = function(indice){
		self.productos.splice(indice, 1);
	}
	
	this.getTable = function(){
		var plantilla = $('<table id="tblProductos" class="table table-bordered table-hover"><thead><tr><th>Código Barras</th><th>Descripción</th><th>Cantidad</th><th>Precio U.</th><th>Descuento</th><th>Precio total</th><th>Cantidad entregada</th><th></th></tr></thead><tbody></tbody><tfoot><tr></tr></tfoot></table>');
		var sumaCantidad = 0;
		var sumaTotal = 0;
		var sumaEntregados = 0;
		var cont = 0;
		
		$(self.productos).each(function(){
			producto = this;
			plantilla.find("tbody").append();
			
			var tr = $("<tr />").attr("identificador", producto.idProducto)
			tr.append($('<td>' + producto.codigoBarras + '</td>'));
			tr.append($('<td>' + producto.descripcion + '</td>'));
			tr.append($('<td><input type="number" class="form-control text-right cantidad" value="' + producto.cantidad + '" indice="' + cont + '" /></td>'));
			tr.append($('<td class="text-right">' + producto.precio + '</td>'));
			tr.append($('<td class="text-right">' + producto.descuento + '</td>'));
			tr.append($('<td class="text-right">' + (producto.cantidad * producto.precio * (100 - producto.descuento / 100)) + '</td>'));
			tr.append($('<td><input type="number" class="form-control text-right entregados" value="' + producto.entregado + '" indice="' + cont + '"/></td>'));
			tr.append($('<td class="text-right"><button type="button" class="btn btn-danger" indice="' + cont + '"><i class="fa fa-times" aria-hidden="true"></i></button></td>'));
			
			plantilla.find("tbody").append(tr);
			
			sumaCantidad += producto.cantidad;
			sumaTotal += (producto.cantidad * producto.precio * (100 - producto.descuento / 100));
			sumaEntregados += producto.entregado * 1;
			cont++;
		});
		
		self.total = sumaTotal;
		
		plantilla.find("tfoot").find("tr").append($('<td colspan="2">&nbsp;</td>'));
		plantilla.find("tfoot").find("tr").append($('<td class="text-right">' + sumaCantidad + '</td>'));
		plantilla.find("tfoot").find("tr").append($('<td colspan="2">&nbsp;</td>'));
		plantilla.find("tfoot").find("tr").append($('<td class="text-right">' + sumaTotal + '</td>'));
		plantilla.find("tfoot").find("tr").append($('<td class="text-right">' + sumaEntregados + '</td>'));
		plantilla.find("tfoot").find("tr").append($('<td>&nbsp;</td>'));
		
		return plantilla;
	}
	
	
	this.getTotalVenta = function(){
		var total = 0;
		$(self.productos).each(function(){
			producto = this;
			
			total += producto.precio;
		});
		
		return self.total.toFixed(2);
	}
};