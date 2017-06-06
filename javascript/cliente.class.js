TCliente = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cclientes', {
				"id": datos.id,
				"nombre": datos.nombre,
				"razonSocial": datos.razonSocial, 
				"domicilio": datos.domicilio,
				"interior": datos.interior,
				"exterior": datos.exterior,
				"colonia": datos.colonia,
				"municipio": datos.municipio,
				"ciudad": datos.ciudad,
				"estado": datos.estado,
				"rfc": datos.rfc,
				"correo": datos.correo,
				"telefono": datos.telefono,
				"promociones": datos.promociones,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cclientes', {
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