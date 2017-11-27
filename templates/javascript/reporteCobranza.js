$(document).ready(function(){
	OpenPay.setId($("#merchant").val());
	OpenPay.setApiKey($("#public").val());
	OpenPay.setSandboxMode($("#cobranza").val() != 'on');
	var deviceSessionId = null;
	
	getLista();
	
	function getLista(){
		deviceSessionId = OpenPay.deviceData.setup("frmCobro", "deviceIdHiddenFieldName");
		$("#dvListaVentas").html("");
		$("#btnCobrar").hide();
		$.get("listaCobranza", function(resp){
			$("#dvLista").html("");
			$("#dvLista").html(resp);
			$("#btnCobrar").show();
			
			$("[action=cobrar]").click(function(){
				var el = $(this);
				$("#winOrdenCobro").attr("comision", el.attr("datos"));
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"lengthChange": false,
				"ordering": true,
				"paging": false,
				"info": true,
				"autoWidth": false,
				"order": [[ 0, "desc" ]]
			});
		});
	}
	
	$("#winOrdenCobro").on('shown.bs.modal', function(e){
		var ventana = $("#winOrdenCobro");
		var cobranza = jQuery.parseJSON($("#winOrdenCobro").attr("comision"));
		
		ventana.find("#txtConcepto").val("Cobro de comisiones correspondientes a las ventas cerradas del " + cobranza.inicio + " al " + cobranza.fin);
		ventana.find("#txtMonto").val(cobranza.monto);
		ventana.find("#txtPorcentaje").val(cobranza.comision);
		var total = cobranza.monto * cobranza.comision / 100;
		var iva = total * 0.16;
		var granTotal = total * 1.16;
		
		ventana.find("#txtSubtotal").val(total.toFixed(2));
		ventana.find("#txtIVA").val(iva.toFixed(2));
		ventana.find("#txtCobro").val(granTotal.toFixed(2));
		
		$.post("jsonTarjetas", {
			empresa: cobranza.idEmpresa
		}, function(resp){
			$("#selTarjeta").find("option").remove();
			$.each(resp, function(i, el){
				console.log(el);
				$("#selTarjeta").append('<option value="' + el.id + '">' + el.brand + ' - ' + el.card_number + '</option>');
			});
		}, "json");
	});
	
	$("#winOrdenCobro").find("#txtPorcentaje").change(function(){
		var cobranza = jQuery.parseJSON($("#winOrdenCobro").attr("comision"));
		var ventana = $("#winOrdenCobro");
		
		var total = cobranza.monto * $("#winOrdenCobro").find("#txtPorcentaje").val() / 100;
		var iva = total * 0.16;
		var granTotal = total * 1.16;
		
		ventana.find("#txtSubtotal").val(total.toFixed(2));
		ventana.find("#txtIVA").val(iva.toFixed(2));
		ventana.find("#txtCobro").val(granTotal.toFixed(2));

	});
	
	$("#frmCobro").validate({
		debug: true,
		rules: {
			txtConcepto: "required",
			txtPorcentaje: {
				required: true
			},
			selTarjeta: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var comision = new TComision;
			var cobranza = jQuery.parseJSON($("#winOrdenCobro").attr("comision"));
			
			comision.pagar({
				"id": cobranza.idComision,
				"porcentaje": $("#winOrdenCobro").find("#txtPorcentaje").val(),
				"tarjeta": $("#selTarjeta").val(),
				"device_session": deviceSessionId,
				fn: {
					before: function(){
						//$("#frmCobro").find("[type=submit]").prop("disabled", true);
					},
					after: function(resp){
						$("#frmCobro").find("[type=submit]").prop("disabled", false);
						console.log(resp);
						getLista();
						if (resp.band){
							alert("El cargo se realizó correctamente");
							$("#winOrdenCobro").modal("hide");
						}else{
							alert("El cargo no se pudo realizar " + (resp.mensaje == null?"":resp.mensaje));
						}
					}
				}
			});
		}
	});
	
	
	$('#upload').fileupload({
		// This function is called when a file is added to the queue
		add: function (e, data) {
			var fileType = data.files[0].name.split('.').pop(), allowdtypes = 'pdf,xml,zip';
			
	        if (allowdtypes.indexOf(fileType) < 0) {
	            alert('El tipo es inválido, solo se permiten archivo pdf');
	            return false;
	        }else{
	        	$('#upload .elementos').html("");
				var tpl = $('<li class="working list-group-item text-center">'+'<input type="text" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" />'+'<p></p><span></span>' );
				            
				tpl.find('p').text(data.files[0].name);
				data.context = tpl.appendTo($('#upload .elementos'));
				tpl.find('input').knob();
				// Listen for clicks on the cancel icon
				tpl.find('span').click(function(){
					if(tpl.hasClass('working')){
						jqXHR.abort();
					}
					tpl.fadeOut(function(){
						tpl.remove();
					});
				});
				
				// Automatically upload the file once it is added to the queue
				var jqXHR = data.submit();
			}
		},
		progress: function(e, data){
		    // Calculate the completion percentage of the upload
		    var progress = parseInt(data.loaded / data.total * 100, 10);
		
		    // Update the hidden input field and trigger a change
		    // so that the jQuery knob plugin knows to update the dial
		    data.context.find('input').val(progress).change();
		
		    if(progress == 100){
		        data.context.removeClass('working');
		    }
		},
		done: function(e, data){
			var result = jQuery.parseJSON(data.result);
			if (result.status){
				alert("Archivo guardado");
				getLista();
			}else
				alert("El archivo no pudo ser guardado en el servidor");
		},
		fail: function(){
			alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
			
			console.log("Error en el servidor al subir el archivo, checa permisos de la carpeta repositorio");
		},
	});
	
	$("#btnGenerar").click(function(){
		$("#btnGenerar").prop("disabled", true);
		$.get("interfaz").done(function(){
			$("#btnGenerar").prop("disabled", false);
			alert("Cobranza realizada");
			getLista();
		});
	});
	
		
	$("#winFactura").on('show.bs.modal', function(e){
		var cargo = jQuery.parseJSON($(e.relatedTarget).attr("datos"));
		
		$("#upload").attr("action", "?mod=ccobranza&action=upload&id=" + cargo.idComision);
		$('#upload .elementos').html("");
	});
});