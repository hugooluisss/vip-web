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
			txtRazonSocial: "required",
			txtEmail: {
				email: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
		
			var obj = new TEmpresa;
			obj.add({
				id: $("#id").val(), 
				razonSocial: $("#txtRazonSocial").val(), 
				slogan: $("#txtSlogan").val(), 
				direccion: $("#txtDireccion").val(), 
				telefono: $("#txtTelefono").val(), 
				email: $("#txtEmail").val(), 
				activo: $("#selActivo").val(),
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
		$.get("listaEmpresas", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TEmpresa;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idEmpresa);
				$("#txtRazonSocial").val(el.razonsocial);
				$("#txtSlogan").val(el.slogan);
				$("#txtDireccion").val(el.direccion);
				$("#txtTelefono").val(el.telefono);
				$("#txtEmail").val(el.email);
				$("#selActivo").val(el.activo);
				
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