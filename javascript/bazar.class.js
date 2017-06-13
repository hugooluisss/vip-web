TBazar = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cbazares', {
				"id": datos.id,
				"inicio": datos.inicio,
				"estado": datos.estado, 
				"nombre": datos.nombre,
				"folio": datos.folio,
				"inicial": datos.inicial,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cbazares', {
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
	
	this.setUsuario = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cbazares', {
				"id": datos.bazar,
				"usuario": datos.usuario,
				"action": "setUsuario"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.delUsuario = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cbazares', {
				"id": datos.bazar,
				"usuario": datos.usuario,
				"action": "delUsuario"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.getFolio = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cbazares', {
				"id": datos.bazar,
				"action": "getFolio"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
};