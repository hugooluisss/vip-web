<?php /* Smarty version Smarty-3.1.11, created on 2017-06-15 12:13:55
         compiled from "templates/plantillas/modulos/pagos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1286480915942bde899b513-34774840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84ac97159975e6f6372db424c88fd376bf43deff' => 
    array (
      0 => 'templates/plantillas/modulos/pagos/lista.tpl',
      1 => 1497546598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1286480915942bde899b513-34774840',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5942bde89e0a56_49718618',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5942bde89e0a56_49718618')) {function content_5942bde89e0a56_49718618($_smarty_tpl) {?><table id="tblVentas" class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Metodo</th>
			<th>Monto</th>
			<th>Referencia</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr json='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombreMetodo'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['referencia'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<input type="hidden" id="deuda" name="deuda" value="<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
" /><?php }} ?>