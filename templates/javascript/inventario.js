$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
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
			txtCosto: {
				required: true,
				number: true,
				min: 0
			},
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
				"costo": $("#txtCosto").val(),
				"descuento": $("#txtDescuento").val(),
				"existencias": $("#txtExistencias").val(),
				"precio": $("#txtPrecio").val(),
				"action": "add",
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
});