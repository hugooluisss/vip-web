$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#bazar").change(function(){
		getLista();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtCodigoBarras: "required",
			txtCodigoInterno: "required",
			txtDescripcion: "required",
			txtPrecio: {
				required: true,
				number: true,
				min: 0
			},
			/*
			txtCosto: {
				required: true,
				number: true,
				min: 0
			},
			*/
			txtExistencias: {
				required: true,
				digits: true,
				min: 0
			},
			txtDescuento: {
				required: true,
				digits: true,
				min: 0,
				max: 100
			}
			
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TProducto;
			obj.add({
				"id": $("#id").val(),
				"bazar": $("#bazar").val(),
				"codigoBarras": $("#txtCodigoBarras").val(),
				"codigoInterno": $("#txtCodigoInterno").val(), 
				"descripcion": $("#txtDescripcion").val(),
				"color": $("#txtColor").val(),
				"talla": $("#txtTalla").val(),
				"unidad": $("#txtUnidad").val(),
				//"costo": $("#txtCosto").val(),
				"costo": 0,
				"descuento": $("#txtDescuento").val(),
				"existencias": $("#txtExistencias").val(),
				"precio": $("#txtPrecio").val(),
				"marca": $("#txtMarca").val(),
				"observacion": $("#txtObservacion").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("No se pudo guardar el registro");
						}
					}
				}
			});
        }

    });
		
	function getLista(){
		$.post("listaProductos", {
			"bazar": $("#bazar").val()
		}, function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TProducto;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idProducto);
				$("#txtCodigoBarras").val(el.codigoBarras);
				$("#txtCodigoInterno").val(el.codigoInterno);
				$("#txtDescripcion").val(el.descripcion);
				$("#txtColor").val(el.color);
				$("#txtTalla").val(el.talla);
				$("#txtUnidad").val(el.unidad);
				$("#txtCosto").val(el.costo);
				$("#txtDescuento").val(el.descuento);
				$("#txtExistencias").val(el.existencias);
				$("#txtPrecio").val(el.precio);
				$("#txtMarca").val(el.marca);
				$("#txtObservacion").val(el.observacion);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblDatos").DataTable({
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
	
	$("#btnExportar").click(function(){
		var btn = $(this);
		btn.prop("disabled", true);
		$.post('cproductos', {
			"bazar": $("#bazar").val(),
			"action": "exportar"
		}, function(data){
			btn.prop("disabled", false);
			window.open(data.archivo, "Nómina", "location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=yes, width=400, height=400");
		}, "json");
	});
	
	$("#btnPlantilla").click(function(){
		var btn = $(this);
		btn.prop("disabled", true);
		$.post('cproductos', {
			"bazar": $("#bazar").val(),
			"limpio": true,
			"action": "exportar"
		}, function(data){
			btn.prop("disabled", false);
			window.open(data.archivo, "Nómina", "location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=yes, width=400, height=400");
		}, "json");
	});
	
	$('#upload').fileupload({
		// This function is called when a file is added to the queue
		dataType: 'json',
		progressall: function (e, data) {
			//console.log(data);
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$(".progress .progress-bar").css('width', progress + '%');
			
			if (progress < 100)
				$(".alert-danger").show();
			else
				$(".alert-danger").hide();
		},
		add: function (e, data) {
			var archivos = '';
			
			data.context = $('<p/>', {"class": "text-warning"}).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Subiendo <b>' + data.files[0].name + '</b> al servidor... <i class="fa fa-upload" aria-hidden="true"></i>').appendTo($("#historial"));
			
			data.submit();
        },
		fail: function(){
			alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
			
			console.log("Error en el servidor al subir el archivo");
		},
		done: function (e, data) {
            $.each(data.files, function (index, file) {
            	data.context.html('<i class="fa fa-2x fa-check-circle" aria-hidden="true"></i> ' + file.name + ' 100% arriba');
            	data.context.removeClass("text-warning");
            	data.context.addClass("text-success");
            });
        },
        complete: function(result, textStatus, jqXHR) {
        	//console.log(result);
        	result = jQuery.parseJSON(result.responseText);
        	console.log(result);
        	
        	if (result.status){
	        	$.post("productosImportar", {
	        		"archivo": result.ruta
	        	}, function(resultado){
	        		$("#dvProductsImport").html(resultado);
	        		
	        		$("#btnImportar").click(function(){
	        			$("#btnImportar").prop("disabled", true);
						$.post("cproductos", {
							"bazar": $("#bazar").val(),
							"action": "importar",
							"productos": $("#jsonImportar").val()
						}, function( data ) {
							$("#btnImportar").prop("disabled", false);
							
							if (data.band){
								$("#dvProductsImport").html("");
								alert("Catálogo actualizado");
								getLista();
							}else
								alert("Ocurrió un error al importar");
						}, "json");
					});
	        	});
        	}else{
	        	alert("El archivo no pudo ser procesado al momento de subir");
        	}
        	//result.status == 'success')
        }
	});
});