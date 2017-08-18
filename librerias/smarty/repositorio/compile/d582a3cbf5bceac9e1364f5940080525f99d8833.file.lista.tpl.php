<?php /* Smarty version Smarty-3.1.11, created on 2017-08-18 10:21:48
         compiled from "templates/plantillas/modulos/tarjetas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239794603599653fc3a9921-11611542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd582a3cbf5bceac9e1364f5940080525f99d8833' => 
    array (
      0 => 'templates/plantillas/modulos/tarjetas/lista.tpl',
      1 => 1503069702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239794603599653fc3a9921-11611542',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_599653fc442d50_64731663',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599653fc442d50_64731663')) {function content_599653fc442d50_64731663($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<div class="btn-toolbar" role="toolbar" aria-label="...">
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#winAyuda">Ayuda</button>
			</div>
		</div>
		
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Tarjetahabiente</th>
					<th>Número <small>(últimos 4)</small></th>
					<th>Tipo</th>
					<th>Expira</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
						<td>XXXX XXXX XXXX <?php echo $_smarty_tpl->tpl_vars['row']->value['last4'];?>
</td>
						<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['brand'];?>
</td>
						<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['exp_month'];?>
 / <?php echo $_smarty_tpl->tpl_vars['row']->value['exp_year'];?>
</td>
						<td class="text-right">
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idConekta'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>