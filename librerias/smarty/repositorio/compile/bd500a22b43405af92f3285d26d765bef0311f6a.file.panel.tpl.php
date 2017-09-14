<?php /* Smarty version Smarty-3.1.11, created on 2017-09-14 10:02:39
         compiled from "templates/plantillas/modulos/tarjetas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1582830281599653247f46b2-74284293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd500a22b43405af92f3285d26d765bef0311f6a' => 
    array (
      0 => 'templates/plantillas/modulos/tarjetas/panel.tpl',
      1 => 1505397875,
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
    'public_key' => 0,
    'merchant' => 0,
    'PAGE' => 0,
    'year' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5996532485a759_78253635')) {function content_5996532485a759_78253635($_smarty_tpl) {?><div class="row">
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
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;" public="<?php echo $_smarty_tpl->tpl_vars['public_key']->value;?>
" merchant="<?php echo $_smarty_tpl->tpl_vars['merchant']->value;?>
" empresa="">
			<div class="box">
				<div class="box-body">
					<div class="alert alert-info">
						<p>La(s) tarjeta(s) dadás de alta seran utilizadas al momento de generar el cargo por el uso de la plataforma</p>
					</div>
					<div class="row">
                        <div class="col-sm-6 col-xs-12">
	                        <img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/openpay/cards1.png" class="img-responsive" />
                        </div>
                        <div class="col-sm-6 col-xs-12">
	                        <img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/openpay/cards2.png" class="img-responsive" />
                        </div>
                    </div>
                    <br /><br />
					<div class="form-group">
						<label for="" class="col-lg-2">Nombre del tarjetahabiente</label>
						<div class="col-lg-4">
							<input type="text" id="txtTarjetahabiente" name="txtTarjetahabiente" data-openpay-card="holder_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Número de tarjeta</label>
						<div class="col-lg-4">
							<input type="text" id="txtNumero" name="txtNumero" maxlength="19" data-openpay-card="card_number" class="form-control">
							<span class="text-success ayudaNumber"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">CVC</label>
						<div class="col-lg-2">
							<input type="text" id="txtCVC" name="txtCVC" size="3" data-openpay-card="cvv2" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Fecha de expiración</label>
						<div class="col-xs-5 col-lg-3">
							<select id="selMes" name="selMes" data-openpay-card="expiration_month" class="form-control">
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
						<div class="col-xs-5 col-lg-3">
							<select id="selAnio" name="selAnio" data-openpay-card="expiration_year" class="form-control">
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
					<br />
					<br />
					<div class="row">
						<div class="col-xs-12 text-right">
							<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/openpay/openpay.png" />
							<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/openpay/radio_on.png" />
							<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/openpay/security.png" />
						</div>
					</div>
					<!--
					<div class="row">
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/conekta/Conekta.png" style="width: 100px;"></div>
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/conekta/Visa.png" style="width: 100px"></div>
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/conekta/MasterCard.png" style="width: 100px"></div>
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
/conekta/AmericanExpress.png" style="width: 100px"></div>
					</div>
					-->
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
				<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>