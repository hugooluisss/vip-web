$(document).ready(function(){
	$("form:not(.filter) :input:visible:enabled:first").focus();
	
	$("#frmLogin").validate({
		debug: true,
		rules: {
			txtUsuario: "required",
			txtPass: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TUsuario;
			
			$("[type=submit]").prop("disabled", true);
			
			obj.login($("#txtUsuario").val(), $("#txtPass").val(), {
				after: function(datos){
					$("#frmLogin").find("[type=submit]").prop("disabled", false);
					if (datos.band)
						location.href = "panelPrincipal";
					else{
						alert("Los datos son incorrectos, corrigelos y vuelve a intentarlo");
					}
				}
			});
        }

    });
	
});

$(document).ready(function(){
	$("form:not(.filter) :input:visible:enabled:first").focus();
	
	$("#frmRegistro").validate({
		debug: true,
		rules: {
			txtEmail: "required",
			txtPassRegistro: "required",
			txtRazonSocial: "required",
			txtNombre: "required",
			txtConfirmar: {
				equalTo: "#txtPassRegistro"
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TEmpresa;
			
			$("#frmRegistro").find("[type=submit]").prop("disabled", true);
			
			obj.add({
				"razonSocial": $("#txtRazonSocial").val(), 
				"email": $("#txtEmail").val(), 
				fn: {
					after: function(datos){
						if (datos.band){
							var user = new TUsuario;
							user.add({
								"nombre": $("#txtNombre").val(),
								"pass": $("#txtPassRegistro").val(),
								"email": $("#txtEmail").val(),
								"tipo": 2,
								"empresa": datos.id,
								fn: {
									after: function(respuesta){
										$("#frmRegistro").find("[type=submit]").prop("disabled", false);
										
										if (respuesta.band){
											$("#winRegistro").modal("hide");
											$("#winSesion").modal();
											$("#winSesion").modal();
											$("#winSesion").find("#txtUsuario").val($("#txtEmail").val());
											alert("Tu cuenta está lista, puedes iniciar sesión");
										}
									}
								}
							});
						}else{
							$("#frmRegistro").find("[type=submit]").prop("disabled", false);
							alert("Este correo se encuentra registrado para un usuario de una empresa... intenta con otro");
						}
					}
				}
			});
        }

    });
	
});