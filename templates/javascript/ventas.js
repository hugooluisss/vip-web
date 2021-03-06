$(document).ready(function(){

	var ventanaImpresion;
	var venta = new TVenta;
	venta.setBazar({"id": $("#selBazar").val(), fn: {}});
	
	$("#txtCliente").select();
	$("#txtFecha").datepicker({ dateFormat: 'yy-mm-dd' });
	
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
			$("#txtCliente").attr("email", ui.item.correo);
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
		venta.setBazar({"id": $("#selBazar").val(), fn: {}});
		autocompleteProductos.source = "?mod=listaProductosAutocomplete&bazar=" + $("#selBazar").val();
	});
	
	nuevaVenta();
	
	$("#setClienteDefecto").click(function(){
		var clienteDefault = jQuery.parseJSON($("#txtCliente").attr("jsonDefault"));
		
		$("#txtCliente").val(clienteDefault.nombre).attr("identificador", clienteDefault.idCliente).attr("email", clienteDefault.correo);
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
				$("#txtCliente").attr("email", datos.correo);
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
			txtNombre: "required"
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
							$("#txtCliente").attr("email", $("#txtCorreo").val());
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
		$("#btnGuardar").show();
		$("#txtComentario").val("");
		$("#txtDescuento").val("");
		$("#txtCliente").val(clienteDefault.nombre).attr("identificador", clienteDefault.idCliente).attr("email", clienteDefault.correo);
	
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
			if ($(this).val() == ''){
				alert("Debe de ser un número");
				$(this).val(venta.productos[$(this).attr("indice")].cantidad);
			}else{
				venta.productos[$(this).attr("indice")].cantidad = $(this).val();
				
				if($(this).val() <= venta.productos[$(this).attr("indice")].inventario){
					$(this).parent().parent().find(".entregados").val($(this).val());
					venta.productos[$(this).attr("indice")].entregado = $(this).val();
				}else{
					$(this).parent().parent().find(".entregados").val(venta.productos[$(this).attr("indice")].inventario);
					venta.productos[$(this).attr("indice")].entregado = venta.productos[$(this).attr("indice")].inventario;
				}
				var producto = venta.productos[$(this).attr("indice")];
				
				$(".totalCantidad").html(venta.getTotalCantidad());
				monto = (producto.cantidad * producto.precio * ((100 - producto.descuento) / 100)).toFixed(2);
				$(this).parent().parent().find(".total").html(formatNumber.new(monto));
				$(".totalEntregados").html(venta.getTotalEntregado());
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
				$(this).parent().parent().find(".total").html(formatNumber.new(monto));
				
				calcularMonto();
			}
		});
		
		$("#dvProductos").find(".entregados").change(function(){
			console.log($(this).val(), venta.productos[$(this).attr("indice")].inventario);
			cantidad = parseInt($(this).val());
			
			if($(this).val() == '' || cantidad > venta.productos[$(this).attr("indice")].cantidad){
				alert("No puede ser 0 ni menor a la cantidad vendida");
				
				$(this).val(venta.productos[$(this).attr("indice")].entregado);
			}else if(cantidad > venta.productos[$(this).attr("indice")].inventario){
				if(confirm("Solo existen " + venta.productos[$(this).attr("indice")].inventario + " disponibles en el inventario ¿Seguro de entregar?"))
					venta.productos[$(this).attr("indice")].entregado = cantidad;
				else{
					venta.productos[$(this).attr("indice")].entregado = venta.productos[$(this).attr("indice")].inventario;
					$(this).val(venta.productos[$(this).attr("indice")].inventario);
				}
			}else
				venta.productos[$(this).attr("indice")].entregado = $(this).val();
			
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
	
		//calcularMonto();
		
		getListaPagos();
	}
	
	$("#txtDescuento").change(function(){
		calcularMonto();
	});
	
	function calcularMonto(){
		$("#dvSubtotal").html(formatNumber.new(venta.getTotalVenta()));
		$("#dvProductos").find(".totalMonto").html(formatNumber.new(venta.getTotalVenta()));
		
		var descuento = $("#txtDescuento").val() == ''?0:$("#txtDescuento").val();
		descuento = (100 - descuento) / 100;
		var total = (venta.getTotalVenta() * descuento).toFixed(2);
		var totalPagos = $("#deuda").val() == '' || $("#deuda").val() == undefined?0.00:$("#deuda").val();
		var saldo = (total - totalPagos).toFixed(2);
		$("#dvTotal").html(formatNumber.new(total));
		$("#dvTotalPagos").html(formatNumber.new(totalPagos));
		$("#dvSaldo").html(formatNumber.new(saldo));
	}
	
	$("#winNuevoProducto").on("shown.bs.modal", function(event){
		//var codigo = Math.random() * (99999999 - 1) + 1;
		//$("#winNuevoProducto").find("#txtCodigo").val(parseInt(codigo));
		//console.log("Código", codigo);
		
		$("#winNuevoProducto").find("#txtDescripcion").val("").focus();
	});
	
	$("#frmAddProducto").validate({
		debug: true,
		rules: {
			//txtCodigo: "required",
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
				//"codigoInterno": $("#txtCodigo").val(), 
				"descripcion": $("#txtDescripcion").val(),
				"precio": $("#txtPrecio").val(),
				"observacion": "Pedido",
				"eliminar": true,
				fn: {
					after: function(datos){
						if (datos.band){
							$("#winNuevoProducto").modal("hide");
							
							var ventana = $("#frmAddProducto");
							var producto = {};
							producto.idProducto = datos.id;
							producto.descripcion = ventana.find("#txtDescripcion").val();
							producto.codigoInterno = ventana.find("#txtCodigo").val();
							producto.precio = ventana.find("#txtPrecio").val();
							producto.color = "";
							producto.talla = "";
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
		    	
		    	nuevaVenta();
		    },
		    after: function(resp){
		    	$("#btnGuardar").prop("disabled", false);
		    	$("#btnPagar").prop("disabled", false);
		    	
		    	if (resp.band)
		    		alert("Venta guardada");
		    	else
		    		alert("Ocurrió un error al guardar la venta");
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
					    	
					    	getListaPagos();
				    	}
				    	
				    	if (fn.after !== undefined) fn.after(resp);
				   }
				}
			});
		}
	}	
	
	
	$("#winVentas").on("show.bs.modal", function(event){
		$("#winVentas").find(".modal-body").find("#tblVentas").remove();
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
				$(this).prop("disabled", true);
				venta.id = el.idVenta;
				venta.getProductos({
					fn: {
						before: function(){
							$(this).prop("disabled", true);
						},
						after: function(productos){
							pintarVenta();
							$("#winVentas").modal("hide");
							
							$("#txtFolio").val(el.folio);
							
							calcularMonto();
						}
					}
				});
				console.log(el);
				if (el.idEstado != 1){
					$("#btnGuardar").hide();
				}
			});
			
			$("#winVentas").find("[action=imprimir]").click(function(){
				var el = $(this);
				var json = jQuery.parseJSON(el.attr("datos"));
				var objVenta = new TVenta;
				
				objVenta.id = json.idVenta;
				objVenta.imprimir({
					fn: {
						before: function(){
							el.prop("disabled", true);
						}, after: function(resp){
							el.prop("disabled", false);
							try{
								console.log(ventanaImpresion);
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
			
			$("#winVentas").find("[action=email]").click(function(){
				var el = $(this);
				var json = jQuery.parseJSON(el.attr("datos"));
				var objVenta = new TVenta;
				
				var email = prompt("¿A que correo se envía?", json.correo);
				var json = jQuery.parseJSON(el.attr("datos"));
				
				objVenta.id = json.idVenta;
				objVenta.imprimir({
					"email": email,
					fn: {
						before: function(){
							el.prop("disabled", true);
						}, after: function(resp){
							el.prop("disabled", false);
						}
					}
				});
			});
			
			$("#winVentas").find("#tblVentas").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"order": [[ 0, "desc" ]]
			});
		});
	});
	
	$("#winPago").on("show.bs.modal", function(event){
		var ventana = $("#winPago");
		var monto = parseFloat($("#dvSaldo").html().replace(",", ""));
		monto = monto < 0?0:monto;
		
		ventana.find("#txtMonto").val(monto.toFixed(2));
		ventana.find("#montoMaximo").val(monto.toFixed(2));
		
	});
	
	$("#winPago").on("shown.bs.modal", function(event){
		var ventana = $("#winPago");
		ventana.find("#txtMonto").select();
		
		var pagos = jQuery.parseJSON($("#selMetodoPago option:selected").attr("json"));
		$("#selMetodoCobro").find("option").remove();
		$("#selMetodoCobro").append('<option value="" selected>Seleccionar</option>');
		$.each(pagos, function(i, el){
			$("#selMetodoCobro").append('<option value="' + el.idMetodoCobro + '">' + el.destino + '</option>');
		});
	});
	
	$("#selMetodoPago").change(function(){
		var pagos = jQuery.parseJSON($("#selMetodoPago option:selected").attr("json"));
		$("#selMetodoCobro").find("option").remove();
		$("#selMetodoCobro").append('<option value="" selected>Seleccionar</option>');
		$.each(pagos, function(i, el){
			$("#selMetodoCobro").append('<option value="' + el.idMetodoCobro + '">' + el.destino + '</option>');
		});
	});
	
	$("#frmPago").validate({
		debug: true,
		rules: {
			txtMonto: {
				required: true,
				min: 1,
			},
			selMetodoCobro: {
				required: true
			},
			selMetodoPago: {
				required: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			console.log($("#txtMonto").val(), $("#montoMaximo").val());
			var obj = new TPago;
			obj.add({
				id: $("#id").val(), 
				venta: venta.id, 
				metodoCobro: $("#selMetodoCobro").val(), 
				metodoPago: $("#selMetodoPago").val(), 
				monto: $("#txtMonto").val(), 
				referencia: $("#txtReferencia").val(), 
				fn: {
					before: function(){
						$("#frmPago").find("[type=submit]").prop("disabled", true);
					},
					after: function(datos){
						$("#frmPago").find("[type=submit]").prop("disabled", false);
						if (datos.band){
							$("#frmPago").get(0).reset();
							$("#winPago").modal("hide");
							
							getListaPagos();
						}else{
							alert("No se pudo guardar el registro");
						}
					}
				}
			});
        }
    });
    
    getListaPagos();
    
    function getListaPagos(){
	    $.post("listaPagos", {
			"venta": venta.id
		}, function(data) {
			$("#dvPagos").html(data);
			
			$("[action=eliminarPago]").click(function(){
				var obj = new TPago;
				obj.del({
					identificador: $(this).attr("identificador"),
					fn: {
						before: function(){
							$(this).prop("disabled", true);
						},
						after: function(resp){
							$(this).prop("disabled", false);
							getListaPagos();
						}
					}
				})
			});
			calcularMonto();
		});
	}
    
	/*Cerrar venta*/
	$(".btnCerrar").click(function(){
		var msg = venta.isAllEntregado()?"":"El inventario actual reportado en sistema no permite la entrega de la totalidad de la nota de venta. Las cantidades no entregadas se reportarán como pedido ";
		
		if(confirm(msg + "¿Seguro?")){
	    	guardar({
				before: function(){
					$("#btnGuardar").prop("disabled", true);
			    	$("#btnPagar").prop("disabled", true);
			    },
			    after: function(resp){
			    	$("#btnGuardar").prop("disabled", false);
			    	$("#btnPagar").prop("disabled", false);
			    	
			    	var email = prompt("¿A que correo deseas enviar la nota de venta?", $("#txtCliente").attr("email"));
			    	
			    	if (resp.band){
			    		venta.cerrar({
				    		"email": email,
				    		fn: {
					    		before: function(){
						    		$("#btnCerrar").prop("disabled", true);
					    		}, after: function(resp){
						    		$("#btnCerrar").prop("disabled", false);
						    		
						    		if (resp.band){
						    			alert("La venta ha sido cerrada");
						    			
						    			
						    			var objVenta = new TVenta;
										objVenta.id = venta.id;
										objVenta.imprimir({
											"email": email,
											fn: {
												after: function(resp){
													if (resp.email)
														alert("Nota de venta enviada al comprador");
												}
											}
										});
										
						    			nuevaVenta();
						    		}else
						    			alert("La venta no pudo ser cerrada");
					    		}
				    		}
				    	});
			    	}else
			    		alert("Ocurrió un error al guardar la venta");
			    }
			});
		}
	});
	
	$("#btnCancelar").click(function(){
		if (venta.id == null)
			alert("La venta no se ha guardado, no puede ser cancelada");
		else if (confirm("¿Seguro?")){
			venta.cancelar({
				fn: {
					before: function(){
						$("#btnCancelar").prop("disabled", true);
					},
					after: function(resp){
						if (resp.band)
							nuevaVenta();
						else
							alert("No se pudo cancelar la venta");
					}
				}
			});
		}
	});
});