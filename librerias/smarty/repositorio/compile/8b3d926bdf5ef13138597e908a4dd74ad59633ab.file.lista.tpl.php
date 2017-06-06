<?php /* Smarty version Smarty-3.1.11, created on 2017-06-06 13:12:06
         compiled from "templates/plantillas/modulos/clientes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17614526095936e1fc58c7f0-61411206%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b3d926bdf5ef13138597e908a4dd74ad59633ab' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/lista.tpl',
      1 => 1496772723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17614526095936e1fc58c7f0-61411206',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5936e1fc5f7995_73122904',
  'variables' => 
  array (
    'select' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936e1fc5f7995_73122904')) {function content_5936e1fc5f7995_73122904($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
<div class="box">
	<div class="box-body">
<?php }?>
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Razón Social</th>
					<?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
					<th>&nbsp;</th>
					<?php }?>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
</td>
						<?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
						<td style="text-align: right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
"><i class="fa fa-times"></i></button>
						</td>
						<?php }?>
					</tr>
				<?php } ?>
			</tbody>
		</table>
<?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
	</div>
</div>
<?php }?><?php }} ?>