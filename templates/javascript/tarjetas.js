$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	OpenPay.setId($("#frmAdd").attr("merchant"));
	OpenPay.setApiKey($("#frmAdd").attr("public"));
	
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
	
	
	$("#frmAdd").validate({
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
					fn: {
						before: function(){
							$("#frmAdd").find("button").prop("disabled", true);
						},
						after: function(resp){
							$("#frmAdd").find("button").prop("disabled", false);
							
							if (resp.band){
								alert("Tarjeta agregada");
								getLista();
								$("#frmAdd").get(0).reset();
								$('#panelTabs a[href="#listas"]').tab('show');
							}else
								alert("No se pudo agregar la tarjeta " + (resp.mensaje != null?resp.mensaje:''));
						}
					}
				});
			}
		}
	});
		
	function getLista(){
		$.post("listaTarjetas", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TEmpresa;
					obj.delTarjeta($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});