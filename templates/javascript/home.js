$(document).ready(function(){
	ventanaImpresion = undefined;
	
	$("[action=ticket]").click(function(){
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
	
	
	$("#tblPagos").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": true,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
});