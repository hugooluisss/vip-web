<?php /* Smarty version Smarty-3.1.11, created on 2017-07-13 09:54:43
         compiled from "templates/plantillas/modulos/clientes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176422759059448dfa8e8514-51426664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b3d926bdf5ef13138597e908a4dd74ad59633ab' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/lista.tpl',
      1 => 1499953231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176422759059448dfa8e8514-51426664',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59448dfa9b4bc2_71421071',
  'variables' => 
  array (
    'select' => 0,
    'lista' => 0,
    'row' => 0,
    'parametros' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448dfa9b4bc2_71421071')) {function content_59448dfa9b4bc2_71421071($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
<div class="box">
	<div class="box-body">
		<div class="btn-toolbar" role="toolbar" aria-label="...">
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#winAyuda">Ayuda</button>
			</div>
		</div>
		
		<div class="modal fade" id="winAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Definición de íconos</h4>
					</div>
					<div class="modal-body">
						<button class="btn btn-default">D</button> Establece al cliente como el cliente por defecto<br /><br />
						<button class="btn btn-success"><i class="fa fa-pencil"></i></button> Modificar<br /><br />
						<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
<?php }?>
		
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Razón Social</th>
					<th>Default</th>
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
						<td class="text-center"><?php if ($_smarty_tpl->tpl_vars['row']->value['idCliente']==$_smarty_tpl->tpl_vars['parametros']->value['clienteDefault']){?><i class="fa fa-check" aria-hidden="true"></i><?php }?></td>
						<?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
						<td style="text-align: right">
							<?php if ($_smarty_tpl->tpl_vars['row']->value['idCliente']!=$_smarty_tpl->tpl_vars['parametros']->value['clienteDefault']){?>
								<button type="button" class="btn btn-default" action="default" title="Establecer como cliente por defecto para las ventas" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
">D</button>
							<?php }?>
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