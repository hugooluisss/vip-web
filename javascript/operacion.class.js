TOperacion = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('coperaciones', {
				"tipo": datos.tipo,
				"producto": datos.producto, 
				"cantidad": datos.cantidad,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.setCantidad = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('coperaciones', {
				"id": datos.identificador,
				"cantidad": datos.cantidad,
				"action": "setCantidad"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('coperaciones', {
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
};