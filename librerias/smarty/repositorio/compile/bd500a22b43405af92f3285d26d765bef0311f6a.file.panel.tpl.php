<?php /* Smarty version Smarty-3.1.11, created on 2017-08-17 22:57:24
         compiled from "templates/plantillas/modulos/tarjetas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1582830281599653247f46b2-74284293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd500a22b43405af92f3285d26d765bef0311f6a' => 
    array (
      0 => 'templates/plantillas/modulos/tarjetas/panel.tpl',
      1 => 1503028642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1582830281599653247f46b2-74284293',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5996532485a759_78253635',
  'variables' => 
  array (
    'public_conekta' => 0,
    'year' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5996532485a759_78253635')) {function content_5996532485a759_78253635($_smarty_tpl) {?><script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tarjetas</h1>
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
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;" publicConekta="<?php echo $_smarty_tpl->tpl_vars['public_conekta']->value;?>
">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="" class="col-lg-2">Nombre del tarjetahabiente</label>
						<div class="col-lg-4">
							<input type="text" size="20" data-conekta="card[name]" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Número de tarjeta</label>
						<div class="col-lg-6">
							<input type="text" size="20" data-conekta="card[number]" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">CVC</label>
						<div class="col-lg-2">
							<input type="text" size="4" data-conekta="card[cvc]" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Fecha de expiración</label>
						<div class="col-lg-3">
							<select data-conekta="card[exp_month]" class="form-control">
								<option value="01">Enero</option>
								<option value="02">Febrero</option>
								<option value="03">Marzo</option>
								<option value="04">Abril</option>
								<option value="05">Mayo</option>
								<option value="06">Junio</option>
								<option value="07">Julio</option>
								<option value="08">Agosto</option>
								<option value="09">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						</div>
						<div class="col-lg-3">
							<select data-conekta="card[exp_year]" class="form-control">
								<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['year']->value+10+1 - ($_smarty_tpl->tpl_vars['year']->value) : $_smarty_tpl->tpl_vars['year']->value-($_smarty_tpl->tpl_vars['year']->value+10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = $_smarty_tpl->tpl_vars['year']->value, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</option>
								<?php }} ?>
							</select>
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