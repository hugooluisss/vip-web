<?php /* Smarty version Smarty-3.1.11, created on 2017-07-12 22:50:41
         compiled from "templates/plantillas/modulos/reportes/listaExistencias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:920093192595badefb3ea78-70335118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b07e12c4d2fa37687f24e563248afdc82b4c1b' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaExistencias.tpl',
      1 => 1499789020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '920093192595badefb3ea78-70335118',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_595badefba0d25_30325897',
  'variables' => 
  array (
    'bazar' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595badefba0d25_30325897')) {function content_595badefba0d25_30325897($_smarty_tpl) {?><table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Código Barras</th>
			<th>Código Interno</th>
			<th>Descripción</th>
			<th>Color</th>
			<th>Talla</th>
			<th>Existencia inicial</th>
			<th>Inventario actual</th>
			<th>Precio</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigoBarras'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigoInterno'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['talla'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['existencias'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inventario'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['bazar']->value==''){?>
					<td>
						<a href="productos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
-bazar/" class="" role="button" action="ticket" title="Comprobante de venta"> <?php echo $_smarty_tpl->tpl_vars['row']->value['bazar'];?>
</a>
					</td>
				<?php }?>
				<td style="text-align: right">
					<button type="button" class="btn btn-primary btn-xs" action="ventas" title="Comprobante de venta" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' idProducto="<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
" data-toggle="modal" data-target="#winVentas"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>