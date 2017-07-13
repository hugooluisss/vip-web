<?php /* Smarty version Smarty-3.1.11, created on 2017-07-12 22:34:37
         compiled from "templates/plantillas/modulos/metodoscobro/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123411077459495c77aacb50-51757110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '918ec339da084ef8702ddee87675c0b1a64e6b80' => 
    array (
      0 => 'templates/plantillas/modulos/metodoscobro/panel.tpl',
      1 => 1498157756,
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
    'tipos' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59495c77ac9c56_97326163')) {function content_59495c77ac9c56_97326163($_smarty_tpl) {?><div class="row">
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
							<span class="help-block">Personaliza tu método de cobro por ejemplo: “Bancomer -xxxx” o “Clip xxx</span>
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
</div><?php }} ?>