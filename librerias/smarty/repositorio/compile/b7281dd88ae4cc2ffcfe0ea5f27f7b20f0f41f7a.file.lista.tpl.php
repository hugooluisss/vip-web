<?php /* Smarty version Smarty-3.1.11, created on 2017-06-20 12:43:45
         compiled from "templates/plantillas/modulos/metodoscobro/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123259821459495cf0b3e163-50710761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7281dd88ae4cc2ffcfe0ea5f27f7b20f0f41f7a' => 
    array (
      0 => 'templates/plantillas/modulos/metodoscobro/lista.tpl',
      1 => 1497980605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123259821459495cf0b3e163-50710761',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59495cf0becc48_70119583',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59495cf0becc48_70119583')) {function content_59495cf0becc48_70119583($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Tipo</th>
					<th>Destino</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['tipo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['destino'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCobro'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>