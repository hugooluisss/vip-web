$(document).ready(function(){
	getLista();
	$("#txtInicio").datepicker();
	$("#txtFin").datepicker();
	
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
			selEstado: "required",
			txtInicio: "required",
			//txtFin: "required",
			txtInicial: "required",
			//txtFolio: {
			//	required: true,
			//	digits: true
			//},
			txtInicial: {
				maxlength: 2
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TBazar;
			obj.add({
				id: $("#id").val(), 
				inicio: $("#txtInicio").val(), 
				fin: $("#txtFin").val(), 
				estado: $("#selEstado").val(), 
				nombre: $("#txtNombre").val(), 
				inicial: $("#txtInicial").val(),
				folio: $("#txtFolio").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							if ($(form).find("#id").val() == ''){
								$('#winUsuarios').attr("identificador", datos.id);
								$("#winUsuarios").modal();
							}
								
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
    
    $("#frmAddUsers").validate({
		debug: true,
		rules: {
			txtEmail: {
				required: true,
				remote: {
					url: "cusuarios",
					type: "post",
					data: {
						action: "validaUsuario",
						usuario: function(){
							return $("#id").val()
						}
					}
				}
			},
			txtNombre: "required",
			txtPass: "required",
			//txtClave: "required",
			txtPass2: {
				equalTo: "#txtPass"
			}
		},
		wrapper: 'span',
		messages: {
			txtEmail: {
				remote: "El correo ya existe para otro usuario, escoge otro"
			}
		},
		submitHandler: function(form){
			form = $(form);
			var obj = new TUsuario;
			obj.add({
				id: form.find("#id").val(), 
				nombre: form.find("#txtNombre").val(), 
				email: form.find("#txtEmail").val(),
				pass: form.find("#txtPass").val(),
				tipo: form.find("#selTipo").val(),
				empresa: form.find("#empresa").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							var label = $("<label />");
							var input = $("<input />", {
								value: datos.identificador,
								class: "usuario",
								type: "checkbox"
							});
							
							input.click(function(){
								clickUsuario(input);
							});
							label.append(input);
							label.append($("<span />", {
								class: "text-primary",
								text: " " + form.find("#txtNombre").val()
							}));
							
							
							$(".tipo" + $("#selTipo").val()).append(label);
							console.log(label);
							$("#frmAddUsers").get(0).reset();
							$("#winAddUsuarios").modal("hide");
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			});
        }

    });
    
    $('#winAddUsuarios').on('shown.bs.modal', function(){
    	$("#winUsuarios").modal("hide");
	});
	
	$('#winAddUsuarios').on('hide.bs.modal', function(){
		$("#winUsuarios").modal();
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
				$("#txtFin").val(el.fin);
				$("#selEstado").val(el.estado);
				$("#txtNombre").val(el.nombre);
				$("#txtInicial").val(el.inicial);
				$("#txtFolio").val(el.folio);
				
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
			
			$("#showAll").click(function(){
				$("#tblDatos").find("[activo=0]").show();
			});
			
			$("#hideInactive").click(function(){
				$("#tblDatos").find("[activo=0]").hide();
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
		clickUsuario($(this));
	});
	
	function clickUsuario(el){
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
	}
});