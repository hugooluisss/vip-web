$(document).ready(function(){
	OpenPay.setId($("#merchant"));
	OpenPay.setApiKey($("#public"));
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
				"autoWidth": false
			});
		});
	}
	
	$("#winOrdenCobro").on('shown.bs.modal', function(e){
		var ventana = $("#winOrdenCobro");
		var cobranza = jQuery.parseJSON($("#winOrdenCobro").attr("comision"));
		
		ventana.find("#txtConcepto").val("Cobro de comisiones correspondientes a las ventas cerradas del " + cobranza.inicio + " al " + cobranza.fin);
		ventana.find("#txtMonto").val(cobranza.monto);
		var total = cobranza.monto * cobranza.comision / 100;
		ventana.find("#txtCobro").val(total.toFixed(2));
		
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
			var comision = new TComision;
			var cobranza = jQuery.parseJSON($("#winOrdenCobro").attr("comision"));
			
			comision.pagar({
				"id": cobranza.idComision,
				"tarjeta": $("#selTarjeta").val(),
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
							getLista();
						}else{
							alert("El cargo no se pudo realizar " + (resp.mensaje == null?"":resp.mensaje));
						}
					}
				}
			});
		}
	});
});