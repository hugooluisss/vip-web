$(document).ready(function(){
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtRazonSocial: {
				required: true,
				remote: {
					url: "cempresas",
					type: "post",
					data: {
						action: "validaRazonSocial",
						empresa: function(){
							return $("#id").val()
						}
					}
				}
			},
			txtDireccion: "required",
			txtExterno: "required",
			txtColonia: "required",
			txtMunicipio: "required",
			txtCiudad: "required",
			txtEstado: "required",
			txtRFC: "required",
			txtEmail: {
				email: true,
				required: true
			},
			txtTelefono: {
				required: true,
				number: true
			}
		},
		messages: {
			txtRazonSocial: {
				remote: "Ya existe una empresa con este nombre, escoge otro"
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TEmpresa;
			obj.add({
				id: $("#id").val(), 
				razonSocial: $("#txtRazonSocial").val(), 
				slogan: $("#txtSlogan").val(), 
				marca: $("#txtMarca").val(), 
				direccion: $("#txtDireccion").val(), 
				externo: $("#txtExterno").val(), 
				interno: $("#txtInterno").val(), 
				colonia: $("#txtColonia").val(), 
				municipio: $("#txtMunicipio").val(), 
				ciudad: $("#txtCiudad").val(), 
				estado: $("#txtEstado").val(), 
				rfc: $("#txtRFC").val(), 
				telefono: $("#txtTelefono").val(), 
				email: $("#txtEmail").val(), 
				activo: 1,
				fn: {
					after: function(datos){
						if (datos.band){
							alert("Los datos se guardaron con éxito");
							
							$("#frmAdd").hide("slow", function(){
								$("#frmTarjeta").show();
							});
						}else{
							alert("No se pudo guardar el registro");
						}
					}
				}
			});
		}

	});
	
	$('#upload').fileupload({
		dataType: 'json',
		progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$(".progress .progress-bar").css('width', progress + '%');
			
			if (progress < 100)
				$(".alert-danger").show();
			else
				$(".alert-danger").hide();
		},
		add: function (e, data) {
			console.log(data);
			var archivos = '';
			
			data.context = $('<p/>', {"class": "text-warning"}).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Subiendo <b>' + data.files[0].name + '</b> al servidor... <i class="fa fa-upload" aria-hidden="true"></i>').appendTo($("#historial"));
			
			data.submit();
        },
		fail: function(){
			alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
			
			console.log("Error en el servidor al subir el archivo, checa permisos de la carpeta repositorio");
		},
		done: function (e, data) {
            $.each(data.files, function (index, file) {
            	data.context.html('<i class="fa fa-2x fa-check-circle" aria-hidden="true"></i> ' + file.name + ' 100% arriba');
            	data.context.removeClass("text-warning");
            	data.context.addClass("text-success");
            });
            
            $("#winFotografia").modal("hide");
            var date = new Date();
            $("#logotipo").prop("src", "repositorio/empresas/empresa" + $("#id").val() + ".jpg?" + date.getMilliseconds() + date.getMinutes() + date.getMonth() + date.getSeconds() + date.getFullYear());
        },
        complete: function(result, textStatus, jqXHR) {
        	//console.log(result);
        	result = jQuery.parseJSON(result.responseText);
        	if(result.status == 'error')
        		alert("Solo se permite el uso de archivos JPG");
        }
	});
});



$(document).ready(function(){
	OpenPay.setId($("#frmTarjeta").attr("merchant"));
	OpenPay.setApiKey($("#frmTarjeta").attr("public"));
	OpenPay.setSandboxMode($("#frmTarjeta").attr("produccion") != 'on');
	
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
				var anio = $("#selAnio").val();
				OpenPay.token.create({
					"card_number": $("#txtNumero").val(),
					"holder_name":$("#txtTarjetahabiente").val(),
					"expiration_year": anio[2] + anio[3],
					"expiration_month": $("#selMes").val(),
					"cvv2": $("#txtCVC").val(),
					"address":{
						"city": $("#txtCiudad").val(),
						"line3": $("#txtEstado").val(),
						"postal_code": "71234",
						"line1": $("#txtDireccion").val() + ' ' + $("#txtColonia").val(),
						"line2": $("#txtExterno").val(),
						"state": $("#txtEstado").val(),
						"country_code":"MX"
					}
				}, function(){
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
									alert("Tu tarjeta ha quedado registrada... muchas gracias por completar tu información");
									$("#frmTarjeta").get(0).reset();
									
									location.reload();
								}else
									alert("No se pudo agregar la tarjeta " + (resp.mensaje != null?resp.mensaje:''));
							}
						}
					});
				}, function(response){
					console.log(response);
					alert("No se pudo registrar")
				});
			}
		}
	});
	
	$("#frmTarjeta").find("#btnReset").click(function(){
		$("#frmTarjeta").hide("slow", function(){
			$("#frmAdd").show();
		});
	});
});