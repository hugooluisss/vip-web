<?php /* Smarty version Smarty-3.1.11, created on 2017-07-11 09:42:06
         compiled from "templates/plantillas/modulos/reportes/listaPagos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3287178975964dbf6b49724-50521480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '657a2445923bc60a1e5f7b0695ac8f2d5b233181' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaPagos.tpl',
      1 => 1499784113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3287178975964dbf6b49724-50521480',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5964dbf6b932b5_85984458',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'saldo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5964dbf6b932b5_85984458')) {function content_5964dbf6b932b5_85984458($_smarty_tpl) {?><table id="tblPagos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Método de pago</th>
			<th>Metodo de cobro</th>
			<th>Referencia</th>
			<th>Saldo</th>
			<th>Pago</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['metodoPago'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['metodoCobro'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['referencia'];?>
</td>
				<td class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['row']->value['saldo'];?>
</td>
				<td class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-primary btn-xs" action="ventas" title="Comprobante de venta" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' idProducto="<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
" data-toggle="modal" data-target="#winVentas"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="5" class="text-right">Saldo actual</th>
			<th class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['saldo']->value;?>
</th>
			<th>&nbsp;</th>
		</tr>
	</tfoot>
</table><?php }} ?>