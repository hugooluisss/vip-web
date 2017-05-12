$(document).ready(function(){
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtRazonSocial: "required",
			txtEmail: {
				email: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TEmpresa;
			obj.add({
				id: $("#id").val(), 
				razonSocial: $("#txtRazonSocial").val(), 
				slogan: $("#txtSlogan").val(), 
				direccion: $("#txtDireccion").val(), 
				telefono: $("#txtTelefono").val(), 
				email: $("#txtEmail").val(), 
				activo: 1,
				fn: {
					after: function(datos){
						if (datos.band){
							alert("Los datos se guardaron con éxito");
						}else{
							alert("No se pudo guardar el registro");
						}
					}
				}
			});
        }

    });
});