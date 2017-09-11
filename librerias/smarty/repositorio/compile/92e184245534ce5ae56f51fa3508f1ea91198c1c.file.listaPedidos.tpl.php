<?php /* Smarty version Smarty-3.1.11, created on 2017-09-08 22:13:22
         compiled from "templates/plantillas/modulos/reportes/listaPedidos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1284159215966f20ec72050-51626097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92e184245534ce5ae56f51fa3508f1ea91198c1c' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaPedidos.tpl',
      1 => 1499960056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1284159215966f20ec72050-51626097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5966f20ef3e685_75975045',
  'variables' => 
  array (
    'bazar' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5966f20ef3e685_75975045')) {function content_5966f20ef3e685_75975045($_smarty_tpl) {?><table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Por entregar</th>
			<?php if ($_smarty_tpl->tpl_vars['bazar']->value==''){?>
			<th>Bazar</th>
			<?php }?>
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
					<a href="#" class="" role="button" action="ticket" title="Comprobante de venta" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' idVenta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
" onclick="javascript: return false;"><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cliente'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad']-$_smarty_tpl->tpl_vars['row']->value['entregado'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['bazar']->value==''){?>
				<td>
					<a href="puntoventa/<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
-bazar/" class="" role="button" action="ticket" title="Comprobante de venta"> <?php echo $_smarty_tpl->tpl_vars['row']->value['bazar'];?>
</a>
				</td>
				<?php }?>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>