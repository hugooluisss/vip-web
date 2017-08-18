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
	
	Conekta.setPublishableKey($("#frmAdd").attr("publicConekta"));
	
	$("[data-conekta*=number]").change(function(){
		if(Conekta.card.validateNumber($(this).val())){
			$(".ayudaNumber").html("Estás usando " + Conekta.card.getBrand($(this).val()));
			$(this).parent().parent().addClass("has-success");
			$(this).parent().parent().removeClass("has-danger");
		}else{
			$(".ayudaNumber").html("Error en el número de tarjeta");
			$(this).parent().parent().addClass("has-danger");
			$(this).parent().parent().removeClass("has-success");
		}
	});
		
	$("#frmAdd").submit(function(){
		var $form = $(this);
		// Previene hacer submit más de una vez
		$form.find("button").prop("disabled", true);
		Conekta.token.create($form, function(token){
			$("#frmAdd").find("button").prop("disabled", false);
			var empresa = new TEmpresa;
			empresa.addTarjeta({
				"token": token.id,
				fn: {
					after: function(resp){
						if (resp.band){
							alert("Tarjeta agregada");
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else
							alert("No se pudo agregar la tarjeta");
					}
				}
			});
		}, function(response){
			alert(response.message_to_purchaser);
			$("#frmAdd").find("button").prop("disabled", false);
		});
		
		return false;
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