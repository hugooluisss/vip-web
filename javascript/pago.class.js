TPago = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cpagos', {
				"id": datos.id,
				"venta": datos.venta,
				"metodoCobro": datos.metodoCobro, 
				"metodoPago": datos.metodoPago, 
				"monto": datos.monto,
				"referencia": datos.referencia,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(datos){
		if (datos.fn.before != undefined)
			datos.fn.before();
				
		$.post('cpagos', {
			"id": datos.identificador,
			"action": "del"
		}, function(data){
			if (datos.fn.after != undefined)
				datos.fn.after(data);
				
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el registro");
			}
		}, "json");
	};
};