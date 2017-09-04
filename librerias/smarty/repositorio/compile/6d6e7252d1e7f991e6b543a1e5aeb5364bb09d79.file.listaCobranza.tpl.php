<?php /* Smarty version Smarty-3.1.11, created on 2017-09-04 10:59:05
         compiled from "templates/plantillas/modulos/reportes/listaCobranza.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156598509959ad7770ebd987-44618131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d6e7252d1e7f991e6b543a1e5aeb5364bb09d79' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaCobranza.tpl',
      1 => 1504540739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156598509959ad7770ebd987-44618131',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59ad7770f337f2_80236966',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ad7770f337f2_80236966')) {function content_59ad7770f337f2_80236966($_smarty_tpl) {?><table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Comisión</th>
			<th>Monto</th>
			<th>Tarjeta</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr <?php if ($_smarty_tpl->tpl_vars['row']->value['openpay_cash']==''){?>title="Sin cargar"<?php }else{ ?>title="Cargado al cliente"<?php }?>>
				<td <?php if ($_smarty_tpl->tpl_vars['row']->value['openpay_cash']==''){?>style="border-left: 3px solid red"<?php }else{ ?>style="border-left: 3px solid green"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['registro'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['comision'];?>
 %</td>
				<td class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['tarjeta'];?>
</td>
				<td class="text-right">
					<?php if ($_smarty_tpl->tpl_vars['row']->value['factura']!=''){?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['factura'];?>
" target="_blank" class="btn btn-success" title="Descargar factura"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
					<?php }?>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>