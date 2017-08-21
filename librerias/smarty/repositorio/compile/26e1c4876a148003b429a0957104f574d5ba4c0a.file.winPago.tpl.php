<?php /* Smarty version Smarty-3.1.11, created on 2017-08-21 09:19:24
         compiled from "templates/plantillas/modulos/tarjetas/winPago.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91762029959973685c3f957-75253134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26e1c4876a148003b429a0957104f574d5ba4c0a' => 
    array (
      0 => 'templates/plantillas/modulos/tarjetas/winPago.tpl',
      1 => 1503325160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91762029959973685c3f957-75253134',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59973685c7a1d6_05356454',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59973685c7a1d6_05356454')) {function content_59973685c7a1d6_05356454($_smarty_tpl) {?><form role="form" id="frmCobro" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winPagoOrden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" orden="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cobro</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="" class="col-lg-2">Orden</label>
						<div class="col-lg-10" campo="id"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Monto</label>
						<div class="col-lg-10" campo="amount"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Creada el</label>
						<div class="col-lg-10" campo="created_at"></div>
					</div>
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Concepto</label>
						<div class="col-lg-10" campo="concepto"></div>
					</div>
					<div class="form-group">
						<label for="selTarjeta" class="col-lg-2">Pagar con </label>
						<div class="col-lg-10">
							<select id="selTarjeta" name="selTarjeta" class="form-control">
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnCargarTarjeta">Realizar cargo</button>
					<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form><?php }} ?>