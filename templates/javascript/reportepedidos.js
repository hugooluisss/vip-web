ventanaImpresion = undefined;
$(document).ready(function(){
	$("#btnBuscar").click(function(){
		getLista();
	});
	
	getLista();
	function getLista(){
		$.post("listaReportePedidos", {
			"bazar": $("#selBazar").val(),
		}, function(resp){
			$("#dvLista").html("");
			$("#dvLista").html(resp);
			
			$("#dvLista").find("[action=ticket]").click(function(){
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
			
			$("#dvLista").find("[action=getListaPagos]").click(function(){
				$(this).prop("disabled", true);
				$.post("listaReportesPagosPorVenta", {
					"venta": $(this).attr("idVenta"),
				},
				function(resp){
					$("#winPagos").find(".modal-body").html(resp);
					$("#winPagos").modal();
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