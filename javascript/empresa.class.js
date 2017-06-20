TEmpresa = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cempresas', {
				"id": datos.id,
				"razonSocial": datos.razonSocial,
				"slogan": datos.slogan, 
				"direccion": datos.direccion,
				"externo": datos.externo,
				"interno": datos.interno,
				"colonia": datos.colonia,
				"municipio": datos.municipio,
				"ciudad": datos.ciudad,
				"estado": datos.estado,
				"rfc": datos.rfc,
				"telefono": datos.telefono,
				"email": datos.email,
				"rfc": datos.rfc,
				"activo": datos.activo,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	
	this.del = function(id, fn){
		$.post('cempresas', {
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
	
	this.setParametros = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cempresas', {
				"clienteDefault": datos.cliente,
				"action": "setParametros"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
};