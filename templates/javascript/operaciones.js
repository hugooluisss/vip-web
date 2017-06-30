$(document).ready(function(){
	getLista();
	
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
						}else{
							addProducto(producto.idProducto);
						}
						
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
		$.get("listaOperaciones", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TOperacion;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idBazar);
				$("#txtInicio").val(el.inicio);
				$("#selEstado").val(el.estado);
				$("#txtNombre").val(el.nombre);
				$("#txtInicial").val(el.inicial);
				$("#txtFolio").val(el.folio);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblOperaciones").DataTable({
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