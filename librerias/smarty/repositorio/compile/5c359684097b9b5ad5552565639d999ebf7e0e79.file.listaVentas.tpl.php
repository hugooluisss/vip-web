<?php /* Smarty version Smarty-3.1.11, created on 2017-10-23 21:44:34
         compiled from "templates/plantillas/modulos/reportesAdmin/listaVentas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:904572918596395fde6b3d8-55265294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c359684097b9b5ad5552565639d999ebf7e0e79' => 
    array (
      0 => 'templates/plantillas/modulos/reportesAdmin/listaVentas.tpl',
      1 => 1508813072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '904572918596395fde6b3d8-55265294',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_596395fdec0622_19454849',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'total' => 0,
    'totalPagos' => 0,
    'totalCerradas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_596395fdec0622_19454849')) {function content_596395fdec0622_19454849($_smarty_tpl) {?><table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Estado</th>
			<th>Empresa</th>
			<th>Bazar/mercado</th>
			<th>Monto</th>
			<th>Monto pagos</th>
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
				<td>
					<a class="" href="?mod=cventas&action=imprimir&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
" target="_blank" title="Comprobante de venta" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</a>
					
					<!--<a href="#" class="" role="button" action="ticket" title="Comprobante de venta" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' idVenta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
" onclick="javascript: return false;"><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</a>-->
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['empresa'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['bazar'];?>
</td>
				<td class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
</td>
				<td class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['row']->value['pagos'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="5" class="text-right">Total</th>
			<th class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</th>
			<th class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['totalPagos']->value;?>
</th>
		</tr>
		<!--
		<tr class="text-success">
			<th colspan="5" class="text-right">Ventas cerradas</th>
			<th class="text-right">
				$ <?php echo $_smarty_tpl->tpl_vars['totalCerradas']->value;?>
 <br />
				<?php if ($_smarty_tpl->tpl_vars['totalCerradas']->value>0){?> 
					<button id="btnCobrar" name="btnCobrar" type="button" data-toggle="modal" data-target="#winOrdenCobro" class="btn btn-success">Cobrar comisión</button>
				<?php }?>
			</th>
		</tr>
		-->
	</tfoot>
</table>

<input type="hidden" id="totalCerradas" value="<?php echo $_smarty_tpl->tpl_vars['totalCerradas']->value;?>
" /><?php }} ?>