<?php /* Smarty version Smarty-3.1.11, created on 2017-09-15 10:16:58
         compiled from "templates/plantillas/modulos/reportesAdmin/listaCobranza.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34099737059ab23a8118528-28173330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9a892a75a95924b47be34e621b7dcc562fbfbfe' => 
    array (
      0 => 'templates/plantillas/modulos/reportesAdmin/listaCobranza.tpl',
      1 => 1505488566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34099737059ab23a8118528-28173330',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59ab23a81b0746_34827714',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ab23a81b0746_34827714')) {function content_59ab23a81b0746_34827714($_smarty_tpl) {?><table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Empresa</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Comisión</th>
			<th>Monto</th>
			<th>IdCargo</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['comision'];?>
 %</td>
				<td class="text-right">$ <?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['openpay_cash'];?>
</td>
				<td class="text-right">
					<?php if ($_smarty_tpl->tpl_vars['row']->value['openpay_cash']==''){?>
						<button action="cobrar" type="button" data-toggle="modal" data-target="#winOrdenCobro" class="btn btn-success" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>Cobrar comisión</button>
					<?php }else{ ?>
						<button action="factura" type="button" data-toggle="modal" data-target="#winFactura" class="btn btn-primary" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>Subir factura</button>
						<?php if ($_smarty_tpl->tpl_vars['row']->value['factura']!=''){?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['factura'];?>
" target="_blank" class="btn btn-link">Descargar factura</a>
						<?php }?>
					<?php }?>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>