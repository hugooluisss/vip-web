<?php /* Smarty version Smarty-3.1.11, created on 2017-07-13 09:16:03
         compiled from "templates/plantillas/modulos/reportes/pedidos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14450829155966f109a6dd46-09407010%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ddacc6badbada352bdd39e383db5f05d6283c3e' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/pedidos.tpl',
      1 => 1499953231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14450829155966f109a6dd46-09407010',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5966f109ae4735_64327406',
  'variables' => 
  array (
    'bazares' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5966f109ae4735_64327406')) {function content_5966f109ae4735_64327406($_smarty_tpl) {?><div class="row">
	<div class="col-sm-3">
		<h1 class="page-header">Reporte de pedidos</h1>
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