$(document).ready(function(){
	$("#txtCliente").select();
	var venta = new TVenta;
	
	$(".btnNuevaVenta").click(function(){
		if (confirm("¿Seguro?")){
			nuevaVenta();
		}
	});
	
	$("#txtCliente").change(function(){
		$(this).attr("identificador", "");
		console.log("Identificador del cliente eliminado");
	}).blur(function(){
		if ($(this).attr("identificador") == '')
			$(this).val("");
	}).autocomplete({
		source: "?mod=listaClientesAutocomplete",
		minLength: 3, 
		select: function(event, ui){
			$("#txtCliente").val(ui.item.nombre);
			$("#txtCliente").attr("identificador", ui.item.identificador);
			console.log("Cliente seleccionado", ui.item.identificador);
		}
	});
	
	$("#txtProductos").blur(function(){
		$(this).val("");
	})
	var autocompleteProductos = $("#txtProducto").autocomplete({
		source: "?mod=listaProductosAutocomplete&bazar=" + $("#selBazar").val(),
		minLength: 3, 
		select: function(event, ui){
			
			venta.add(jQuery.parseJSON(ui.item.json));
			console.log("Producto seleccionado", ui.item.json);
			$("#txtProducto").select();
			
			pintarVenta();
		}
	});
	
	$("#selBazar").change(function(){
		nuevaVenta();
		autocompleteProductos.source = "?mod=listaProductosAutocomplete&bazar=" + $("#selBazar").val();
	});
	
	nuevaVenta();
	
	function reloadClientes(){
		var ventana = $("#winClientes");
		ventana.find(".moda-body").html('Estamos actualizando la lista de clientes <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>');
		$.post("listaClientes", {
			"select": true
		}, function( data ){
			ventana.find(".modal-body").html(data);
			
			ventana.find("tbody").find("tr").click(function(){
				var datos = jQuery.parseJSON($(this).attr("json"));
				$("#txtCliente").attr("identificador", datos.idCliente);
				$("#txtCliente").val(datos.nombre);
				ventana.modal("hide");
				pintarVenta();
			});
			
			ventana.find("#tblDatos").DataTable({
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
	
	function nuevaVenta(){
		var ventana = $("#winProductos");
		ventana.find(".moda-body").html('Estamos actualizando la lista de productos <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>');
		
		$.post("listaProductos", {
			"bazar": $("#selBazar").val(),
			"select": true
		}, function( data ){
			ventana.find(".modal-body").html(data);
			
			ventana.find("tbody").find("tr").click(function(){
				venta.add(jQuery.parseJSON($(this).attr("json")));
				ventana.modal("hide");
				pintarVenta();
			});
			
			ventana.find("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
		
		pintarVenta();
		reloadClientes();
	}
	
	function pintarVenta(){
		$("#dvProductos").html("");
		$("#dvProductos").append(venta.getTable());
		
		$("#dvProductos").find(".cantidad").change(function(){
			if ($(this).val() < 0){
				alert("Debe de ser mayor a 0");
				$(this).val(venta.productos[$(this).attr("indice")].cantidad);
			}else{
				venta.productos[$(this).attr("indice")].cantidad = $(this).val();
			}
		});
		
		$("#dvProductos").find(".entregados").change(function(){
			if ($(this).val() < 0){
				alert("Debe de ser mayor a 0");
				$(this).val(venta.productos[$(this).attr("indice")].entregado);
			}else{
				venta.productos[$(this).attr("indice")].entregado = $(this).val();
			}
		});
		
		$("#dvProductos").find(".btn-danger").click(function(){
			if (confirm("¿Seguro?")){
				venta.del($(this).attr("indice"));
				pintarVenta();
			}
		});
		
		$("#tblProductos").DataTable({
			"responsive": true,
			"language": espaniol,
			"paging": true,
			"lengthChange": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	
		$("#dvTotal").html(venta.getTotalVenta());
	}
});