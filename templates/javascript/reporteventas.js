ventanaImpresion = undefined;
$(document).ready(function(){
	$("#txtInicio").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#txtFin").datepicker({ dateFormat: 'yy-mm-dd' });
	
	$("#btnBuscar").click(function(){
		getLista();
	});
	
	getLista();
	function getLista(){
		$.post("listaReporteVentas", {
			"bazar": $("#selBazar").val(),
			"inicio": $("#txtInicio").val(),
			"fin": $("#txtFin").val(),
			"estado": $("#selEstado").val(),
		}, function(resp){
			$("#dvListaVentas").html("");
			$("#dvListaVentas").html(resp);
			
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
				"ordering": false,
				"info": true,
				"autoWidth": false
			});
		});
	}
});