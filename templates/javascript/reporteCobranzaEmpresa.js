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
		$.post("listaCobranzaVIP", {
			inicio: $("#txtInicio").val(),
			fin: $("#txtFin").val()
		}, function(resp){
			$("#dvLista").html("");
			$("#dvLista").html(resp);
			$("#btnCobrar").show();
			
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
});