$(document).ready(function(){
	$("#txtCliente").select();
	
	$(".btnNuevaVenta").click(function(){
		if (confirm("¿Seguro?")){
			alert("Ok");
		}
	});
});