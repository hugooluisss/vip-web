<?php /* Smarty version Smarty-3.1.11, created on 2017-09-14 11:19:15
         compiled from "templates/plantillas/modulos/reportes/existencias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1706696756595bacc498ec92-04957641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a543a72b5ea2bd231546a55809a33b7e270d1ce' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/existencias.tpl',
      1 => 1502808612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1706696756595bacc498ec92-04957641',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_595bacc49c0579_05845311',
  'variables' => 
  array (
    'bazares' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595bacc49c0579_05845311')) {function content_595bacc49c0579_05845311($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Reporte de inventarios</h1>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-2 text-right">
				<label for="selBazar">Bazar</label>
			</div>
			<div class="col-xs-10 text-right">
				<select id="selBazar" name="selBazar" class="form-control">
					<option value="">Todos</option>
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bazares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-xs-12 text-right">
				<button id="btnBuscar" name="btnBuscar" class="btn btn-primary">Buscar</button>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body" id="dvLista">
	</div>
</div>

<div class="modal fade" id="winVentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" producto="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Historial de ventas del producto</h4>
			</div>
			<div class="modal-body">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>