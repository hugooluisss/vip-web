TComision = function(){
	var self = this;
	
	this.pagar = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ccobranza', {
				"id": datos.id,
				"comision": datos.porcentaje,
				"tarjeta": datos.tarjeta,
				"device_session": datos.device_session,
				"action": "pagar"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
};