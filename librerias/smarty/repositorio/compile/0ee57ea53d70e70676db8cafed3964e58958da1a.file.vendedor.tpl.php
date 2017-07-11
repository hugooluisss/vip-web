<?php /* Smarty version Smarty-3.1.11, created on 2017-07-11 10:54:24
         compiled from "templates/plantillas/modulos/inicio/vendedor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18120842515964efefa01e61-73441428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ee57ea53d70e70676db8cafed3964e58958da1a' => 
    array (
      0 => 'templates/plantillas/modulos/inicio/vendedor.tpl',
      1 => 1499788195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18120842515964efefa01e61-73441428',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5964efefa48eb0_48311384',
  'variables' => 
  array (
    'bazares' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5964efefa48eb0_48311384')) {function content_5964efefa48eb0_48311384($_smarty_tpl) {?><div class="row">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bazares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>

				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6 text-success">
							Total de ventas
						</div>
						<div class="col-xs-6 text-right">
							$ <?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>

						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 text-primary">
							Total de pagos
						</div>
						<div class="col-xs-6 text-right">
							$ <?php echo $_smarty_tpl->tpl_vars['row']->value['pagos'];?>

						</div>
					</div>
				</div>
				<div class="panel-footer text-right">
					<a href="puntoventa/<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
-bazar/">Ir al punto de venta</a>
				</div>
			</div>
			
		</div>
	<?php } ?>
</div><?php }} ?>