<?php /* Smarty version Smarty-3.1.11, created on 2017-07-12 22:32:26
         compiled from "templates/plantillas/modulos/bazares/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4629580245953cdb630b635-21281453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56643b30d45b998ebf34dba5c2b47c1cd7922918' => 
    array (
      0 => 'templates/plantillas/modulos/bazares/lista.tpl',
      1 => 1499916743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4629580245953cdb630b635-21281453',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5953cdb63d1ba0_35730339',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5953cdb63d1ba0_35730339')) {function content_5953cdb63d1ba0_35730339($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<div class="btn-toolbar" role="toolbar" aria-label="...">
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-success" id="showAll">Todos</button>
				<button class="btn btn-xs btn-danger" id="hideInactive">Solo activos</button>
			</div>
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#winAyuda">Ayuda</button>
			</div>
		</div>
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Inicia</th>
					<th>Termina</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr activo="<?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
">
						<td style="border-left: 2px solid <?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==1){?>blue<?php }else{ ?>red<?php }?>"><?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
</td>
						<td style="color: <?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==1){?>blue<?php }else{ ?>red<?php }?>"><?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==1){?>Activo<?php }else{ ?>Inactivo<?php }?></td>
						<td style="text-align: right">
							<a href="productos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
-bazar/" class="btn btn-primary" title="Catálogo de productos">P</a>
							
							<button type="button" class="btn btn-primary" title="Usuarios en el bazar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' data-toggle="modal" data-target="#winUsuarios" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
"><i class="fa fa-users"></i></button>
							
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>