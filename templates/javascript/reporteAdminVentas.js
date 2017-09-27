ventanaImpresion = undefined;
$(document).ready(function(){
	$("#txtInicio").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#txtFin").datepicker({ dateFormat: 'yy-mm-dd' });
	
	//OpenPay.setId($("#merchant"));
	//OpenPay.setApiKey($("#public"));
	//var deviceSessionId = OpenPay.deviceData.setup("frmCobro", "deviceIdHiddenFieldName");
	
	$("#btnBuscar").click(function(){
		getLista();
	});
	
	$("#btnSelAll").click(function(){
		$("#selEmpresa").find("option").attr("selected", true);
		getLista
	});
	
	getLista();
	function getLista(){
		$("#dvListaVentas").html("");
		$("#btnCobrar").hide();
		$("#btnBuscar").prop("disabled", true);
		
		$.post("listaReporteAdminVentas", {
			"inicio": $("#txtInicio").val(),
			"fin": $("#txtFin").val(),
			"empresa": $("#selEmpresa").val(),
			"soloCerradas": $("#chkCerradas").is(":checked")?1:0
		}, function(resp){
			$("#dvListaVentas").html("");
			$("#dvListaVentas").html(resp);
			$("#btnCobrar").show();
			
			$("#dvListaVentas").find("[action=ticket]").click(function(){
				var objVenta = new TVenta;
				var el = $(this);
				
				objVenta.id = $(this).attr("idVenta");
				objVenta.imprimir({
					fn: {
						before: function(){
							el.prop("disabled", true);
						}, after: function(resp){
							el.prop("disabled", false);
							try{
								if (ventanaImpresion == undefined)
									ventanaImpresion = window.open(resp.url, "Ticket");
								else
									ventanaImpresion.location.href = resp.url;
							}catch(err){
								ventanaImpresion = window.open(resp.url, "Ticket");
							}
						}
					}
				});
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"lengthChange": false,
				"ordering": true,
				"paging": false,
				"info": true,
				"autoWidth": false
			});
		}).done(function(){
			$("#btnBuscar").prop("disabled", false);
		});
	}
	/*
	$("#winOrdenCobro").on('show.bs.modal', function(e){
		var ventana = $("#winOrdenCobro");
		
		ventana.find("#txtConcepto").val("Cobro de comisiones correspondientes a las ventas cerradas del " + $("#txtInicio").val() + " al " + $("#txtFin").val());
		ventana.find("#txtMonto").val($("#totalCerradas").val());
		var total = $("#totalCerradas").val() * $("#txtPorcentaje").val() / 100;
		ventana.find("#txtCobro").val(total.toFixed(2));
		
		$.post("jsonTarjetas", {
			empresa: $("#selEmpresa").val()
		}, function(resp){
			$("#selTarjeta").find("option").remove();
			$.each(resp, function(i, el){
				console.log(el);
				$("#selTarjeta").append('<option value="' + el.id + '">' + el.brand + ' - ' + el.card_number + '</option>');
			});
		}, "json");
	});
	
	$("#winOrdenCobro").find("#txtPorcentaje").change(function(){
		var total = $("#totalCerradas").val() * $("#txtPorcentaje").val() / 100;
		$("#winOrdenCobro").find("#txtCobro").val(total.toFixed(2));
	});
	
	$("#frmCobro").validate({
		debug: true,
		rules: {
			txtConcepto: "required",
			txtPorcentaje: {
				required: true,
				digits: true
			},
			selTarjeta: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var empresa = new TEmpresa;
			
			empresa.cargarACuenta({
				"empresa": $("#selEmpresa").val(),
				"tarjeta": $("#selTarjeta").val(),
				"monto": $("#txtCobro").val(),
				"concepto": $("#txtConcepto").val(),
				"inicio": $("#txtInicio").val(),
				"fin": $("#txtFin").val(),
				"device_session": deviceSessionId,
				fn: {
					before: function(){
						//$("#frmCobro").find("[type=submit]").prop("disabled", true);
					},
					after: function(resp){
						$("#frmCobro").find("[type=submit]").prop("disabled", false);
						console.log(resp);
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
	
	*/
});