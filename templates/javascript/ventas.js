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
	
	$("#txtProducto").blur(function(){
		$(this).val("");
	});
	
	var autocompleteProductos = $("#txtProducto").autocomplete({
		source: "?mod=listaProductosAutocomplete&bazar=" + $("#selBazar").val(),
		minLength: 1, 
		select: function(event, ui){			
			venta.add(jQuery.parseJSON(ui.item.json));
			console.log("Producto seleccionado", ui.item.json);
			$("#txtProducto").select();
			
			pintarVenta();
		}
	});
	
	$("#txtProducto").keypress(function(e){
		if (e.which == 13){
			var producto = new TProducto;
			producto.get({
				"codigo": $("#txtProducto").val(),
				"bazar": $("#selBazar").val(),
				fn: {
					before: function(){
						$(this).prop("disabled", true);
					}, after: function(producto){
						$(this).prop("disabled", false);
						$("#txtProducto").val("");
						
						console.log(producto);
						if (producto.band == false){
							alert("Código no encontrado");
							$("#winProductos").modal();
						}else{
							venta.add(producto);
							pintarVenta();
						}
						
						return false;
					}
				}
			});
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
	
	$("#winAddCliente").on("show", function(event){
		var ventana = $("#winAddCliente");
		$("#frmAddCliente").get(0).reset();
		ventana.find("#txtNombre").focus();
	});
	
	$("#frmAddCliente").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtRazonSocial: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TCliente;
			obj.add({
				id: $("#id").val(), 
				nombre: $("#txtNombre").val(), 
				razonSocial: $("#txtRazonSocial").val(), 
				domicilio: $("#txtDomicilio").val(), 
				exterior: $("#txtExterior").val(), 
				interior: $("#txtInterior").val(), 
				colonia: $("#txtColonia").val(), 
				municipio: $("#txtMunicipio").val(), 
				ciudad: $("#txtCiudad").val(), 
				estado: $("#txtEstado").val(), 
				rfc: $("#txtRFC").val(), 
				correo: $("#txtCorreo").val(), 
				telefono: $("#txtTelefono").val(), 
				promociones: $("#selPromociones").val(), 
				fn: {
					after: function(datos){
						if (datos.band){
							$("#txtCliente").attr("identificador", datos.id);
							$("#txtCliente").val($("#txtNombre").val());
							
							$("#frmAddCliente").get(0).reset();
							$("#winAddCliente").modal("hide");
						}else{
							alert("No se pudo guardar el registro");
						}
					}
				}
			});
        }

    });
	
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
			if ($(this).val() <= 0 || $(this).val() == ''){
				alert("Debe de ser mayor a 0");
				$(this).val(venta.productos[$(this).attr("indice")].cantidad);
			}else{
				venta.productos[$(this).attr("indice")].cantidad = $(this).val();
				console.log("Entregados", $(this).parent().parent().find(".entregados").val());
				if($(this).val() < $(this).parent().parent().find(".entregados").val()){
					$(this).parent().parent().find(".entregados").val($(this).val());
					venta.productos[$(this).attr("indice")].entregados = $(this).val();
				}
				
				$(".totalCantidad").html(venta.getTotalCantidad());
			}
		});
		
		$("#dvProductos").find(".entregados").change(function(){
			console.log($(this).val(), venta.productos[$(this).attr("indice")].cantidad, $(this).val() > venta.productos[$(this).attr("indice")].cantidad);
			cantidad = parseInt($(this).val());
			
			if($(this).val() == '' || cantidad > venta.productos[$(this).attr("indice")].cantidad){
				alert("No puede ser 0 ni menor a la cantidad vendida");
				
				$(this).val(venta.productos[$(this).attr("indice")].entregado);
			}else{
				venta.productos[$(this).attr("indice")].entregado = $(this).val();
			}
			
			$(".totalEntregados").html(venta.getTotalEntregado());
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
			"paging": false,
			"lengthChange": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	
		$("#dvTotal").html(venta.getTotalVenta());
	}
});