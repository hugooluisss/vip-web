<?php /* Smarty version Smarty-3.1.11, created on 2017-06-16 21:03:37
         compiled from "templates/plantillas/modulos/ventas/winClientes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188074349559448df9b75a58-07565645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd463d49d817d194a22a0317819df8cb99146b7c8' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/winClientes.tpl',
      1 => 1497294357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188074349559448df9b75a58-07565645',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59448df9b87880_32582568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448df9b87880_32582568')) {function content_59448df9b87880_32582568($_smarty_tpl) {?><div class="modal fade" id="winClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Clientes registrados</h4>
			</div>
			<div class="modal-body">
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="winAddCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Clientes registrados</h4>
			</div>
			<div class="modal-body">
				<form role="form" id="frmAddCliente" class="form-horizontal" onsubmit="javascript: return false;">
					<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/clientes/add.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>