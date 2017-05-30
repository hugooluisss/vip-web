$(document).ready(function(){
	getLista();
	$("#txtInicio").datepicker();
	
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
			txtNombre: "required",
			txtInicio: "required",
			selEstado: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TBazar;
			obj.add({
				id: $("#id").val(), 
				inicio: $("#txtInicio").val(), 
				estado: $("#selEstado").val(), 
				nombre: $("#txtNombre").val(), 
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
		$.get("listaBazares", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TBazar;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[data-target=#winUsuarios]").click(function(){
			var el = $(this);
				$('#winUsuarios').attr("identificador", el.attr("identificador"));
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idBazar);
				$("#txtInicio").val(el.inicio);
				$("#selEstado").val(el.estado);
				$("#txtNombre").val(el.nombre);
				
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
	
	$('#winUsuarios').on('shown.bs.modal', function(){
		$(".usuario").prop("checked", false).prop("disabled", true);
		
		$.post('cbazares', {
			"id": $('#winUsuarios').attr("identificador"),
			"action": "getUsuarios"
		}, function(data){
			$(".usuario").prop("disabled", false);
			
			$.each(data.usuarios, function(i, user){
				console.log(user.idUsuario);
				$(".usuario[value=" + user.idUsuario + "]").prop("checked", true);
			});
		}, "json");

	});
	
	$(".usuario").click(function(){
		var el = $(this);
		
		var bazar = new TBazar;
		if (el.is(":checked"))
			bazar.setUsuario({
				"usuario": el.val(),
				"bazar": $('#winUsuarios').attr("identificador"),
				"fn": {
					before: function(){
						el.prop("disabled", true);
					},
					after: function(resp){
						el.prop("disabled", false);
						
						if (!resp.band)
							el.prop("checked", false);
					}
				}
			});
		else
			bazar.delUsuario({
				"usuario": el.val(),
				"bazar": $('#winUsuarios').attr("identificador"),
				"fn": {
					before: function(){
						el.prop("disabled", true);
					},
					after: function(resp){
						el.prop("disabled", false);
						
						if (!resp.band)
							el.prop("checked", true);
					}
				}
			});
	});
});