<?php /* Smarty version Smarty-3.1.11, created on 2017-05-11 21:19:10
         compiled from "templates/plantillas/modulos/empresas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73113637459120b688fb297-28068119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd63a03a6b06a43d8e23885d9275b8c97cfe103ca' => 
    array (
      0 => 'templates/plantillas/modulos/empresas/panel.tpl',
      1 => 1494555424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73113637459120b688fb297-28068119',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59120b68a756f9_08573475',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59120b68a756f9_08573475')) {function content_59120b68a756f9_08573475($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Empresas</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtRazonSocial" class="col-sm-2">Razon social</label>
						<div class="col-md-8">
							<input class="form-control" id="txtRazonSocial" name="txtRazonSocial">
						</div>
					</div>
					<div class="form-group">
						<label for="txtSlogan" class="col-sm-2">Slogan</label>
						<div class="col-md-8">
							<input class="form-control" id="txtSlogan" name="txtSlogan">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDireccion" class="col-sm-2">Dirección</label>
						<div class="col-md-8">
							<input class="form-control" id="txtDireccion" name="txtDireccion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefono" class="col-sm-2">Teléfono</label>
						<div class="col-md-3">
							<input class="form-control" id="txtTelefono" name="txtTelefono">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-sm-2">Correo electrónico</label>
						<div class="col-md-3">
							<input class="form-control" id="txtEmail" name="txtEmail">
						</div>
					</div>
					<div class="form-group">
						<label for="selActivo" class="col-sm-2">Activo</label>
						<div class="col-md-2">
							<select id="selActivo" name="selActivo" class="form-control">
								<option value="1">Si</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>