TVenta = function(){
	var self = this;
	this.productos = new Array;
	this.pagos = new Array;
	this.total = 0;
	this.id = null;
	
	this.add = function(datos){
		datos.cantidad = 1;
		datos.entregado = 0;
		var band = true;
		
		$.each(self.productos, function(i, el){
			if(el.idProducto == datos.idProducto){
				self.productos[i].cantidad++;
				band = false;
			}
		})
		
		if (band)
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
			producto.descuento = producto.descuento == ''?0:producto.descuento;
			
			var tr = $("<tr />").attr("identificador", producto.idProducto)
			tr.append($('<td>' + producto.codigoBarras + '</td>'));
			tr.append($('<td>' + producto.descripcion + '</td>'));
			tr.append($('<td><input type="number" class="form-control text-right cantidad" value="' + producto.cantidad + '" indice="' + cont + '" /></td>'));
			tr.append($('<td class="text-right">' + producto.precio + '</td>'));
			tr.append($('<td class="text-right"><input type="number" class="form-control text-right descuento" value="' + (producto.descuento == 0?'':producto.descuento) + '" indice="' + cont + '"/></td>'));
			tr.append($('<td class="text-right total">' + (producto.cantidad * producto.precio * ((100 - producto.descuento) / 100)).toFixed(2) + '</td>'));
			tr.append($('<td><input type="number" class="form-control text-right entregados" value="' + producto.entregado + '" indice="' + cont + '"/></td>'));
			tr.append($('<td class="text-right"><button type="button" class="btn btn-danger" indice="' + cont + '"><i class="fa fa-times" aria-hidden="true"></i></button></td>'));
			
			plantilla.find("tbody").append(tr);
			
			sumaCantidad += parseInt(producto.cantidad);
			sumaTotal += (producto.cantidad * producto.precio * ((100 - producto.descuento) / 100));
			sumaEntregados += parseInt(producto.entregado) * 1;
			cont++;
		});
		
		self.total = sumaTotal;
		
		plantilla.find("tfoot").find("tr").append($('<td colspan="2">&nbsp;</td>'));
		plantilla.find("tfoot").find("tr").append($('<td class="text-right totalCantidad">' + sumaCantidad + '</td>'));
		plantilla.find("tfoot").find("tr").append($('<td colspan="2">&nbsp;</td>'));
		plantilla.find("tfoot").find("tr").append($('<td class="text-right totalMonto">' + self.getTotalVenta() + '</td>'));
		plantilla.find("tfoot").find("tr").append($('<td class="text-right totalEntregados">' + sumaEntregados + '</td>'));
		plantilla.find("tfoot").find("tr").append($('<td>&nbsp;</td>'));
		
		plantilla.find("tbody").find(".descuento").change(function(){
			if ($(this).val() > 100){
				alert("No puede ser mayor a 100");
				$(this).val(100);
			}
			
			if ($(this).val() < 0){
				alert("No puede ser menor a 0");
				$(this).val("");
			}
			
			if ($(this).val() == 0)
				$(this).val("");
		});
		
		return plantilla;
	}
	
	
	this.getTotalVenta = function(){
		var total = 0;
		$(self.productos).each(function(){
			producto = this;
			
			total += producto.precio * producto.cantidad * ((100 - producto.descuento) / 100);
		});
		
		return total.toFixed(2);
	}
	
	this.getTotalCantidad = function(){
		var total = 0;
		$(self.productos).each(function(){
			producto = this;
			
			total += parseInt(producto.cantidad);
		});
		
		return parseInt(total);
	}
	
	this.getTotalEntregado = function(){
		var total = 0;
		$(self.productos).each(function(){
			producto = this;
			
			total += parseInt(producto.entregado);
		});
		
		return parseInt(total);
	}
	
	this.guardar = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cventas', {
			"id": self.id,
			"bazar": datos.bazar,
			"cliente": datos.cliente,
			"fecha": datos.fecha, 
			"comentario": datos.comentario,
			"descuento": datos.descuento,
			"productos": self.productos,
			"action": "guardar"
		}, function(data){
			if (data.band == 'false')
				console.log(data.mensaje);
			else{
				self.id = data.id;
			}
				
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
	
	this.getProductos = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cventas', {
				"id": self.id,
				"action": "getProductos"
			}, function(data){
				self.productos = data;
								
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
};