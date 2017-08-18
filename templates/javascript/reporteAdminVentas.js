ventanaImpresion = undefined;
$(document).ready(function(){
	$("#txtInicio").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#txtFin").datepicker({ dateFormat: 'yy-mm-dd' });
	
	$("#btnBuscar").click(function(){
		getLista();
	});
	
	getLista();
	function getLista(){
		$("#dvListaVentas").html("");
		$("#btnCobrar").hide();
		$.post("listaReporteAdminVentas", {
			"inicio": $("#txtInicio").val(),
			"fin": $("#txtFin").val(),
			"empresa": $("#selEmpresa").val(),
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
		});
	}
	
	$("#winOrdenCobro").on('show.bs.modal', function(e){
		var ventana = $("#winOrdenCobro");
		
		ventana.find("#txtConcepto").val("Cobro de comisiones correspondientes a las ventas cerradas del " + $("#txtInicio").val() + " al " + $("#txtFin").val());
		ventana.find("#txtMonto").val($("#totalCerradas").val());
		var total = $("#totalCerradas").val() * $("#txtPorcentaje").val() / 100;
		ventana.find("#txtCobro").val(total.toFixed(2));
	});
	
	$("#winOrdenCobro").find("#txtPorcentaje").change(function(){
		var total = $("#totalCerradas").val() * $("#txtPorcentaje").val() / 100;
		$("#winOrdenCobro").find("#txtCobro").val(total.toFixed(2));
	});
	
	$("#frmCobro").validate({
		debug: true,
		rules: {
			txtConcepto: "required",
			txtmonto: {
				required: true,
				digits: true
			},
			txtPorcentaje: {
				required: true,
				digits: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var empresa = new TEmpresa;
			
			empresa.generarOrdenCobro({
				"concepto": $("#txtConcepto").val(),
				"total": $("#txtCobro").val(),
				"empresa": $("#selEmpresa").val(),
				fn: {
					before: function(){
						$("#frmCobro").prop("disabled", true);
					},
					after: function(resp){
						$("#frmCobro").prop("disabled", false);
						
						if (resp.band){
							$("#winOrdenCobro").modal("hide");
							$("#winPagoOrden").attr("orden", resp.orden);
							$("#winPagoOrden").modal();
						}else{
							alert("No se pudo generar la orden: " + resp.mensaje);
						}
					}
				}
			});
		}
	});
	
	
	$("#winPagoOrden").on('show.bs.modal', function(e){
		$.post("jsonTarjetas", {
			empresa: $("#selEmpresa").val()
		}, function(resp){
			$("#selTarjeta").find("option").remove();
			$.each(resp, function(i, el){
				$("#selTarjeta").append('<option value="' + el.id + '">' + el.brand + ' - ' + el.last4 + '</option>');
			});
		}, "json");
		
		$.post("cempresas", {
			orden: $("#winPagoOrden").attr("orden"),
			"action": "getOrden"
		}, function(orden){
			$.each(orden, function(i, el){
				$("[campo=" + i + "]").html(el);
			});
		}, "json");
	});
});