<?php /* Smarty version Smarty-3.1.11, created on 2017-09-21 19:24:59
         compiled from "templates/plantillas/modulos/metodoscobro/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123411077459495c77aacb50-51757110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '918ec339da084ef8702ddee87675c0b1a64e6b80' => 
    array (
      0 => 'templates/plantillas/modulos/metodoscobro/panel.tpl',
      1 => 1506039871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123411077459495c77aacb50-51757110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59495c77ac9c56_97326163',
  'variables' => 
  array (
    'informacionCompleta' => 0,
    'PAGE' => 0,
    'tipos' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59495c77ac9c56_97326163')) {function content_59495c77ac9c56_97326163($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['informacionCompleta']->value!=true){?>
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/error/empresas.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	</div>
<?php }else{ ?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Métodos de cobro</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="selTipo" class="col-lg-2">Tipo</label>
						<div class="col-lg-4">
							<select class="form-control" id="selTipo" name="selTipo">
								<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idTipoCobro'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
								<?php } ?>
							</select>
							<span class="help-block" title="El método de cobro es el medio utilizado por la empresa para cobrar al cliente y puede ser de varios tipos: Bancos, Caja, Virtual">¿Que es un método de cobro?</span>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDestino" class="col-lg-2">Destino</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtDestino" name="txtDestino">
							<span class="help-block">Personaliza tu método de cobro por ejemplo: "Bancomer -xxxx", "Clip xxx" o "Caja xxxx"</span>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
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
				<button class="btn btn-success"><i class="fa fa-pencil"></i></button> Modificar<br /><br />
				<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?><?php }} ?>