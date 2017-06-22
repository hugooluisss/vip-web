<?php /* Smarty version Smarty-3.1.11, created on 2017-06-22 12:02:43
         compiled from "templates/plantillas/modulos/metodospago/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181062905759494f73e772e7-44314780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a033618a053ccc82e81cc201a993554807f80b06' => 
    array (
      0 => 'templates/plantillas/modulos/metodospago/panel.tpl',
      1 => 1498150962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181062905759494f73e772e7-44314780',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59494f73eeb1e9_16383252',
  'variables' => 
  array (
    'metodosCobro' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59494f73eeb1e9_16383252')) {function content_59494f73eeb1e9_16383252($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Métodos de pago</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar</a></li>
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
						<label for="selMetodoCobro" class="col-lg-2">Metodo de cobro</label>
						<div class="col-lg-4">
							<select class="form-control" id="selMetodoCobro" name="selMetodoCobro" multiple="true">
								<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metodosCobro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMetodoCobro'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['destino'];?>
</option>
								<?php } ?>
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