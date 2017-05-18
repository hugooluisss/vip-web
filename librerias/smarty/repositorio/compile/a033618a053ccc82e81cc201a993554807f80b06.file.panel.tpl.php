<?php /* Smarty version Smarty-3.1.11, created on 2017-05-18 11:28:32
         compiled from "templates/plantillas/modulos/metodospago/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:909368582591dcbb065e4f0-37329315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a033618a053ccc82e81cc201a993554807f80b06' => 
    array (
      0 => 'templates/plantillas/modulos/metodospago/panel.tpl',
      1 => 1495124156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '909368582591dcbb065e4f0-37329315',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_591dcbb07d3d37_20682387',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591dcbb07d3d37_20682387')) {function content_591dcbb07d3d37_20682387($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Métodos de pago</h1>
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
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="selReferencia" class="col-lg-2">¿Requiere referencia?</label>
						<div class="col-lg-4">
							<select class="form-control" id="selReferencia" name="selReferencia">
								<option value="1">Si</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selDevoluciones" class="col-lg-2">¿Acepta devoluciones?</label>
						<div class="col-lg-4">
							<select class="form-control" id="selDevoluciones" name="selDevoluciones">
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