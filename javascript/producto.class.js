TProducto = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cproductos', {
				"id": datos.id,
				"bazar": datos.bazar,
				"codigoBarras": datos.codigoBarras,
				"codigoInterno": datos.codigoInterno, 
				"descripcion": datos.descripcion,
				"color": datos.color,
				"talla": datos.talla,
				"unidad": datos.unidad,
				"costo": datos.costo,
				"descuento": datos.descuento,
				"existencias": datos.existencias,
				"precio": datos.precio,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	
	this.del = function(id, fn){
		$.post('cproductos', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el registro");
			}
		}, "json");
	};
	
	this.get = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cproductos', {
			"codigo": datos.codigo,
			"bazar": datos.bazar,
			"action": "get"
		}, function(data){
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
};