$(document).ready(function(){
	$("#txtCliente").select();
	var venta = new TVenta;
	
	$(".btnNuevaVenta").click(function(){
		if (confirm("¿Seguro?")){
			alert("Ok");
		}
	});
	
	$("#dvProductos").append(venta.getTable()).find("#tblProductos").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": true,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
	
	$("#dvTotal").html(venta.getTotal());
});