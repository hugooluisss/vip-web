$(document).ready(function(){
	getLista();
	
	function getLista(){
		$("#dvListaVentas").html("");
		$("#btnCobrar").hide();
		$.get("listaCobranzaVIP", function(resp){
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