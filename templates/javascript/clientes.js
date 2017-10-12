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
		$.get("listaClientes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TCliente;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			 
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idCliente);
				$("#txtNombre").val(el.nombre);
				$("#txtRazonSocial").val(el.razonsocial);
				$("#txtDomicilio").val(el.domicilio);
				$("#txtExterior").val(el.exterior);
				$("#txtInterior").val(el.interior);
				$("#txtColonia").val(el.colonia);
				$("#txtMunicipio").val(el.municipio);
				$("#txtCiudad").val(el.ciudad);
				$("#txtEstado").val(el.estado);
				$("#txtRFC").val(el.rfc);
				$("#txtCorreo").val(el.correo);
				$("#txtTelefono").val(el.telefono);
				$("#selPromociones").val(el.promociones);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=default]").click(function(){
				if (confirm("¿Seguro de establecer como cliente por defecto?")){
					var empresa = new TEmpresa;
					empresa.setParametros({
						cliente: $(this).attr("identificador"),
						fn: {
							before: function(){
								$(this).prop("disabled", true);
							},
							after: function(resp){
								if (resp.band)
									getLista();
								else{
									$(this).prop("disabled", false);
									alert("No se pudo realizar la asignación");
								}
									
							}
						}
					});
				}
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