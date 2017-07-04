ventanaImpresion = undefined;
$(document).ready(function(){
	$("#btnBuscar").click(function(){
		getLista();
	});
	
	getLista();
	function getLista(){
		$.post("listaReporteExistencias", {
			"bazar": $("#selBazar").val(),
			"inicio": $("#txtInicio").val(),
			"fin": $("#txtFin").val(),
			"estado": $("#selEstado").val(),
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
			
			$("#dvLista").find("[action=ventas]").click(function(){
				var producto = $(this).attr("idProducto");
				console.log(producto);
				$("#winVentas").attr("producto", producto);
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
	
	$("#winVentas").on("shown.bs.modal", function(event){
		var ventana = $("#winVentas");
		
		$.post("listaReporteVentasProducto", {
			"producto": ventana.attr("producto")
		}, function(resp){
			ventana.find(".modal-body").html(resp);
			
			$("#tblVentasProducto").find("[action=ticket]").click(function(){
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
			
			$("#tblVentasProducto").DataTable({
				"responsive": true,
				"language": espaniol,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	});
	
	$("#winVentas").on("hide.bs.modal", function(event){
		$("#winVentas").find(".modal-body").html("");
	});
});