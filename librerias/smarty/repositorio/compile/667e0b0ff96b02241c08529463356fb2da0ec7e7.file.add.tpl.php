<?php /* Smarty version Smarty-3.1.11, created on 2017-06-13 09:27:45
         compiled from "templates/plantillas/modulos/clientes/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17785734355936e561c3ae36-86049067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '667e0b0ff96b02241c08529463356fb2da0ec7e7' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/add.tpl',
      1 => 1497363371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17785734355936e561c3ae36-86049067',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5936e561c3d126_27926295',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936e561c3d126_27926295')) {function content_5936e561c3d126_27926295($_smarty_tpl) {?><div class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 text-right" for="txtNombre">Nombre</label>
		<div class="col-sm-10">
			<input class="form-control input-sm" id="txtNombre" name="txtNombre" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 text-right" for="txtRazonSocial">Razón social</label>
		<div class="col-sm-10">
			<input class="form-control input-sm" id="txtRazonSocial" name="txtRazonSocial" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 text-right" for="txtDomicilio">Domicilio</label>
		<div class="col-sm-6">
			<input class="form-control input-sm" id="txtDomicilio" name="txtDomicilio" />
		</div>
		<label class="col-sm-1 text-right" for="txtExterior">#ext</label>
		<div class="col-sm-1">
			<input class="form-control input-sm" id="txtExterior" name="txtExterior" />
		</div>
		<label class="col-sm-1 text-right" for="txtInterior">#int</label>
		<div class="col-sm-1">
			<input class="form-control input-sm" id="txtInterior" name="txtInterior" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 text-right" for="txtColonia">Colonia</label>
		<div class="col-sm-4">
			<input class="form-control input-sm" id="txtColonia" name="txtColonia" />
		</div>
		<label class="col-sm-2 text-right" for="txtMunicipio">Municipio</label>
		<div class="col-sm-4">
			<input class="form-control input-sm" id="txtMunicipio" name="txtMunicipio" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 text-right" for="txtCiudad">Ciudad</label>
		<div class="col-sm-2">
			<input class="form-control input-sm" id="txtCiudad" name="txtCiudad" />
		</div>
		<label class="col-sm-2 text-right" for="txtEstado">Estado</label>
		<div class="col-sm-2">
			<input class="form-control input-sm" id="txtEstado" name="txtEstado" />
		</div>
		<label class="col-sm-2 text-right" for="txtRFC">RFC</label>
		<div class="col-sm-2">
			<input class="form-control input-sm" id="txtRFC" name="txtRFC" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 text-right" for="txtCorreo">Correo</label>
		<div class="col-sm-2">
			<input class="form-control input-sm" id="txtCorreo" name="txtCorreo" />
		</div>
		<label class="col-sm-2 text-right" for="txtTelefono">Teléfono</label>
		<div class="col-sm-2">
			<input class="form-control input-sm" id="txtTelefono" name="txtTelefono" />
		</div>
		<label class="col-sm-2 text-right" for="txtTelefono">¿Recibir promociones?</label>
		<div class="col-sm-2">
			<select id="selPromociones" name="selPromociones" class="form-control">
				<option value="0">No</option>
				<option value="1">Si</option>
			</select>
		</div>
	</div>
</div><?php }} ?>