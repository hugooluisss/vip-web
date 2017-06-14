<?php /* Smarty version Smarty-3.1.11, created on 2017-06-14 13:25:14
         compiled from "templates/plantillas/modulos/ventas/winPago.tpl" */ ?>
<?php /*%%SmartyHeaderCode:952086302593ee45d913464-29694283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a15284f7728d2f4cf2a91cc6dc9d743c358be1c0' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/winPago.tpl',
      1 => 1497464712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '952086302593ee45d913464-29694283',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593ee45d914b37_69817349',
  'variables' => 
  array (
    'metodosPago' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593ee45d914b37_69817349')) {function content_593ee45d914b37_69817349($_smarty_tpl) {?><div class="modal fade" id="winPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Pago</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						Método Pago
					</div>
					<div class="col-xs-12 col-sm-9">
						<select class="form-control" id="selMetodoPago" name="selMetodoPago">
							<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metodosPago']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMetodo'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
							<?php } ?>
						</select>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						Monto
					</div>
					<div class="col-xs-12 col-sm-3">
						<input class="form-control text-right" id="txtMonto" name="txtMonto" value="0" type="number" />
						<input id="montoMaximo" name="montoMaximo" value="0" type="hidden" />
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>