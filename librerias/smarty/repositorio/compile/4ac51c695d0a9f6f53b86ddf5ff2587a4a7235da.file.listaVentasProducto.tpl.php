<?php /* Smarty version Smarty-3.1.11, created on 2017-09-26 20:44:39
         compiled from "templates/plantillas/modulos/reportes/listaVentasProducto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1762816596595bdd457c6413-34524843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ac51c695d0a9f6f53b86ddf5ff2587a4a7235da' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaVentasProducto.tpl',
      1 => 1506476676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1762816596595bdd457c6413-34524843',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_595bdd45817986_96839739',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595bdd45817986_96839739')) {function content_595bdd45817986_96839739($_smarty_tpl) {?><table id="tblVentasProducto" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Estado</th>
			<th>Cliente</th>
			<th>Vendidos</th>
			<th>Entregados</th>
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
				<td style="border-left: 3px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['colorEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cliente'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['entregado'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success btn-xs" action="ticket" title="Comprobante de venta" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' idVenta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
"><i class="fa fa-file-pdf-o"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>