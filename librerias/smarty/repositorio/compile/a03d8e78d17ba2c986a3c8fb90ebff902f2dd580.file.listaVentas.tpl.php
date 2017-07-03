<?php /* Smarty version Smarty-3.1.11, created on 2017-07-03 13:52:01
         compiled from "templates/plantillas/modulos/reportes/listaVentas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:853882315595a6899623151-96343687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a03d8e78d17ba2c986a3c8fb90ebff902f2dd580' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaVentas.tpl',
      1 => 1499107895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '853882315595a6899623151-96343687',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_595a6899658ef8_40628736',
  'variables' => 
  array (
    'bazar' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595a6899658ef8_40628736')) {function content_595a6899658ef8_40628736($_smarty_tpl) {?><table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Monto</th>
			<?php if ($_smarty_tpl->tpl_vars['bazar']->value==''){?>
			<th>Bazar</th>
			<?php }?>
			
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
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cliente'];?>
</td>
				<td class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['bazar']->value==''){?>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['bazar'];?>
</td>
				<?php }?>
				<td style="text-align: right">
					<button type="button" class="btn btn-success" action="ticket" title="Comprobante de venta" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' idVenta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
"><i class="fa fa-file-pdf-o"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>