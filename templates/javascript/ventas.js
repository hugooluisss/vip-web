$(document).ready(function(){
	$("#txtCliente").select();
	$("#txtFecha").datepicker({ dateFormat: 'yy-mm-dd' });
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
	
	$("#setClienteDefecto").click(function(){
		var clienteDefault = jQuery.parseJSON($("#txtCliente").attr("jsonDefault"));
		
		$("#txtCliente").val(clienteDefault.nombre).attr("identificador", clienteDefault.idCliente);
	});
	
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
	
	$("#winAddCliente").on("show.bs.modal", function(event){
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
		var clienteDefault = jQuery.parseJSON($("#txtCliente").attr("jsonDefault"));
		venta = new TVenta;
		
		$("#txtCliente").val(clienteDefault.nombre).attr("identificador", clienteDefault.idCliente);
	
		var bazar = new TBazar;
		
		bazar.getFolio({
			bazar: $("#selBazar").val(),
			fn: {
				before: function(){
					$("#txtFolio").val("");
				},
				after: function(resp){
					$("#txtFolio").val(resp.inicial + "-" + resp.folio).attr("folio", resp.folio).attr("inicial", resp.inicial);
				}
			}
		});
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
				monto = (producto.cantidad * producto.precio * ((100 - producto.descuento) / 100)).toFixed(2);
				$(this).parent().parent().find(".total").html(monto);
				
				calcularMonto();
			}
		});
		
		$("#dvProductos").find(".descuento").change(function(){
			if ($(this).val() < 0){
				alert("Debe de ser mayor a 0");
				$(this).val(venta.productos[$(this).attr("indice")].descuento);
			}else if ($(this).val() > 100){
				alert("Debe de ser menor o igual a 100");
				$(this).val(venta.productos[$(this).attr("indice")].descuento);
			}else{
				var descuento = $(this).val();
				venta.productos[$(this).attr("indice")].descuento = descuento;
				if (descuento == 0)
					$(this).val("");
					
				var producto = venta.productos[$(this).attr("indice")];
					
				monto = (producto.cantidad * producto.precio * ((100 - producto.descuento) / 100)).toFixed(2);
				$(this).parent().parent().find(".total").html(monto);
				
				calcularMonto();
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
	
		calcularMonto();
	}
	
	$("#txtDescuento").change(function(){
		calcularMonto();
	});
	
	function calcularMonto(){
		$("#dvSubtotal").html(venta.getTotalVenta());
		$("#dvProductos").find(".totalMonto").html(venta.getTotalVenta());
		
		var descuento = $("#txtDescuento").val() == ''?0:$("#txtDescuento").val();
		descuento = (100 - descuento) / 100;
		$("#dvTotal").html((venta.getTotalVenta() * descuento).toFixed(2));
	}
	
	$("#winNuevoProducto").on("shown.bs.modal", function(event){
		var codigo = Math.random() * (99999999 - 1) + 1;
		$("#winNuevoProducto").find("#txtCodigo").val(parseInt(codigo));
		console.log("Código", codigo);
		
		$("#winNuevoProducto").find("#txtDescripcion").val("").focus();
	});
	
	$("#frmAddProducto").validate({
		debug: true,
		rules: {
			txtCodigo: "required",
			txtDescripcion: "required",
			txtPrecio: {
				required: true,
				number: true,
				min: 0
			},
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TProducto;
			obj.add({
				"bazar": $("#selBazar").val(),
				"codigoInterno": $("#txtCodigo").val(), 
				"descripcion": $("#txtDescripcion").val(),
				"precio": $("#txtPrecio").val(),
				"observacion": "Pedido",
				fn: {
					after: function(datos){
						if (datos.band){
							$("#winNuevoProducto").modal("hide");
							
							var ventana = $("#frmAddProducto");
							var producto = {};
							
							producto.descripcion = ventana.find("#txtDescripcion").val();
							producto.codigoInterno = ventana.find("#txtCodigo").val();
							producto.precio = ventana.find("#txtPrecio").val();
							producto.descuento = 0;
							producto.codigoBarras = "";
							
							
							venta.add(producto);
							pintarVenta();
						}else{
							alert("No se pudo guardar el registro");
						}
					}
				}
			});
		}
	});
	
	
	/*Proces guardar*/
	$("#btnGuardar").click(function(){
		guardar({
			before: function(){
				$("#btnGuardar").prop("disabled", true);
		    	$("#btnPagar").prop("disabled", true);
		    },
		    after: function(resp){
		    	$("#btnGuardar").prop("disabled", false);
		    	$("#btnPagar").prop("disabled", false);
		    }
		});
	});
	
	
	/*Proceso de pagos y guardar*/
	$("#btnPagar").click(function(){
		guardar({
			before: function(){
				$("#btnGuardar").prop("disabled", true);
		    	$("#btnPagar").prop("disabled", true);
		    },
		    after: function(resp){
		    	$("#btnGuardar").prop("disabled", false);
		    	$("#btnPagar").prop("disabled", false);
			    $("#winPago").modal();
		    }
		});
	});
	
	function guardar(fn){
		if ($("#txtCliente").attr("identificador") == ''){
			alert("Indica un cliente");
			$("#txtCliente").select();
		}else if(venta.productos.length < 1){
			alert("Agrega un producto");
			$("#txtProducto").focus();
		}else{
			venta.guardar({
				fecha: $("#txtFecha").val(),
				bazar: $("#selBazar").val(),
				cliente: $("#txtCliente").attr("identificador"),
				comentario: $("#txtComentario").val(), 
				descuento: $("#txtDescuento").val(), 
				fn: {
					before: function(){
				    	if (fn.before !== undefined) fn.before();
					}, after: function(resp){
				    	if (resp.band){
					    	if ($("#txtFolio").val() != resp.folio){
					    		$("#txtFolio").val(resp.folio);
					    	}
				    	}
				    	
				    	if (fn.after !== undefined) fn.after(resp);
				   }
				}
			});
		}
	}	
	
	
	$("#winVentas").on("show.bs.modal", function(event){
		$("#winVentas").find(".modal-body").html('Espera mientras actualizamos la lista');
		$.post("listaVentas", {
			bazar: $("#selBazar").val()
		}, function( data ) {
			$("#winVentas").find(".modal-body").html(data);
			
			$("[action=cargar]").click(function(){
				nuevaVenta();
				var el = jQuery.parseJSON($(this).attr("datos"));
				$("#txtCliente").val(el.nombreCliente).attr("identificador", el.idCliente);
				$("#txtComentario").val(el.comentario);
				$("#txtDescuento").val(el.descuento);
				venta.id = el.idVenta;
				venta.getProductos({
					fn: {
						after: function(productos){
							pintarVenta();
							$("#winVentas").modal("hide");
							
							$("#txtFolio").val(el.folio);
						}
					}
				});
			});
			
			$("#tblVentas").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	});
	
	$("#winPago").on("show.bs.modal", function(event){
		var ventana = $("#winPago");
		ventana.find("#txtMonto").val($("#dvTotal").html());
		ventana.find("#montoMaximo").val($("#dvTotal").html());
	});
});