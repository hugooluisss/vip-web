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
			
			$(form).find("[type=submit]").prop("disabled", true);
			obj.login($("#txtUsuario").val(), $("#txtPass").val(), {
				after: function(datos){
					$("#frmLogin").find("[type=submit]").prop("disabled", false);
					if (datos.band){
						location.href = "panelPrincipal";
					}else{
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
							$("#frmTarjeta").attr("empresa", datos.id);
							
							var user = new TUsuario;
							user.add({
								"nombre": $("#txtNombre").val(),
								"pass": $("#txtPassRegistro").val(),
								"email": $("#txtEmail").val(),
								"tipo": 2,
								"sendmail": false,
								"empresa": datos.id,
								fn: {
									after: function(respuesta){
										$("#frmRegistro").find("[type=submit]").prop("disabled", false);
										
										if (respuesta.band){
											$("#winRegistro").modal("hide");
											$("#winSesion").modal();
											$("#winSesion").find("#txtUsuario").val($("#txtEmail").val());
											$("#winSesion").find("#txtPass").val($("#txtPassRegistro").val());
											alert("Tu cuenta ha sido creada");
											$("#frmLogin").submit();
											//$("#winTarjeta").modal();
										}
										
										if (respuesta.email)
											alert("Correo de confirmación enviado al usuario");
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


/*
$(document).ready(function(){
	OpenPay.setId($("#frmTarjeta").attr("merchant"));
	OpenPay.setApiKey($("#frmTarjeta").attr("public"));
	
	$("[data-openpay-card=card_number]").change(function(){
		if(OpenPay.card.validateCardNumber($(this).val())){
			$(".ayudaNumber").html("Estás usando " + OpenPay.card.cardType($(this).val()));
			$(this).parent().parent().addClass("has-success");
			$(this).parent().parent().removeClass("has-danger");
		}else{
			$(".ayudaNumber").html("Error en el número de tarjeta");
			$(this).parent().parent().addClass("has-danger");
			$(this).parent().parent().removeClass("has-success");
		}
	});
	
	
	$("#frmTarjeta").validate({
		debug: true,
		rules: {
			txtTarjetahabiente: "required",
			txtNumero: "required",
			txtCVC: "required",
			selMes: "required",
			selAnio: "required",
		},
		wrapper: 'span', 
		submitHandler: function(form){
			if (!OpenPay.card.validateExpiry($("#selMes").val(), $("#selAnio").val())){
				alert("Verifica la fecha de expiración");
			}else if(!OpenPay.card.validateCVC($("#txtCVC").val(), $("#txtNumero").val())){
				alert("Verifica el código CVC");
			}else{
				var obj = new TEmpresa;
				obj.addTarjeta({
					tarjetahabiente: $("#txtTarjetahabiente").val(),
					numero: $("#txtNumero").val(),
					cvc: $("#txtCVC").val(),
					mes: $("#selMes").val(),
					anio: $("#selAnio").val(),
					empresa: $("#frmTarjeta").attr("empresa"),
					fn: {
						before: function(){
							$("#frmTarjeta").find("button").prop("disabled", true);
						},
						after: function(resp){
							$("#frmTarjeta").find("button").prop("disabled", false);
							
							if (resp.band){
								alert("Tu tarjeta ha quedado registrada");
								$("#frmTarjeta").get(0).reset();
								
								$("#winTarjeta").modal("hide");
								$("#winSesion").modal();
								$("#frmLogin").submit();
							}else
								alert("No se pudo agregar la tarjeta " + (resp.mensaje != null?resp.mensaje:''));
						}
					}
				});
			}
		}
	});
});
*/