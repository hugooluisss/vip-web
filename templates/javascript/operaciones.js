$(document).ready(function(){
	getLista();
	listaProductos();
	
	$("#txtProducto").blur(function(){
		$(this).val("");
	});
	
	var autocompleteProductos = $("#txtProducto").autocomplete({
		source: "?mod=listaProductosAutocomplete&bazar=" + $("#selBazar").val(),
		minLength: 1, 
		select: function(event, ui){			
			var producto = jQuery.parseJSON(ui.item.json);
			console.log(producto);
			addProducto(producto.idProducto);
			$("#txtProducto").select();
		}
	});
	
	$("#selBazar").change(function(){
		autocompleteProductos.source = "?mod=listaProductosAutocomplete&bazar=" + $("#selBazar").val();
		getLista();
		listaProductos();
	});
	
	$("#selTipo").change(function(){
		getLista();
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
				"codigoBarras": $("#codigoBarras").val(), 
				"codigoInterno": $("#codigoBarras").val(), 
				"descripcion": $("#txtDescripcion").val(),
				"precio": $("#txtPrecio").val(),
				"observacion": "Pedido",
				"eliminar": true,
				fn: {
					after: function(datos){
						if (datos.band){
							$("#winNuevoProducto").modal("hide");
							addProducto(datos.id);
						}else{
							alert("No se pudo guardar el registro");
						}
					}
				}
			});
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
						
						if (producto.band == false){
							if (confirm("El código no fue encontrado ¿deseas agregar el producto?")){
								$("#winNuevoProducto").modal();
								$("#codigoBarras").val($("#txtProducto").val());
							}
						}else{
							addProducto(producto.idProducto);
						}
						
						$("#txtProducto").val("");
						return false;
					}
				}
			});
		}
			
	});
	
	function addProducto(producto){
		var obj = new TOperacion;
		obj.add({
			"tipo": $("#selTipo").val(), 
			"producto": producto, 
			"cantidad": 1,
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
		
	function getLista(){
		$.post("listaOperaciones", {
			"bazar": $("#selBazar").val(),
			"tipo": $("#selTipo").val(), 
		}, function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TOperacion;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							if (data.band)
								getLista();
							else
								alert("Error al eliminar el registro");
						}
					});
				}
			});
			
			$("input[cantidad]").change(function(){
				var el = $(this);
				if (isNaN(el.val()) || el.val() == ''){
					el.val(el.attr("cantidad"));
					alert("Solo números");
				}else{
					var obj = new TOperacion;
					obj.setCantidad({
						"cantidad": el.val(),
						"identificador": el.attr("identificador"),
						fn:{
							before: function(){
								el.prop("disabled", true);
							},
							after: function(data){
								el.prop("disabled", false);
								
								if (!data.band){
									alert("Error al actualizar la cantidad");
									el.val(el.attr("cantidad"));
								}else{
									el.attr("cantidad", el.val());
									alert("Cantidad actualizada");
								}
							}
						}
					});
				}
			});
			
			$("#tblOperaciones").DataTable({
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
	}
	
	function listaProductos(){
		var ventana = $("#winProductos");
		ventana.find(".moda-body").html('Estamos actualizando la lista de productos <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>');
		
		$.post("listaProductos", {
			"bazar": $("#selBazar").val(),
			"select": true
		}, function( data ){
			ventana.find(".modal-body").html(data);
			
			ventana.find("tbody").find("tr").click(function(){
				var el = jQuery.parseJSON($(this).attr("json"));
				addProducto(el.idProducto);
				ventana.modal("hide");
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
});