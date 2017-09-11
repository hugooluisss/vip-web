<?php /* Smarty version Smarty-3.1.11, created on 2017-09-08 20:50:22
         compiled from "templates/plantillas/layout/topnav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10597828559448cd8539745-02858050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6df6b226c07a27a170a54d0b382bec0c6706a133' => 
    array (
      0 => 'templates/plantillas/layout/topnav.tpl',
      1 => 1504921820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10597828559448cd8539745-02858050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59448cd8781272_86663990',
  'variables' => 
  array (
    'PAGE' => 0,
    'foo' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448cd8781272_86663990')) {function content_59448cd8781272_86663990($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>.:: <?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
 ::.</title>
		<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['debug']){?>
			<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/less/AdminLTE.less" />
			<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/less/skins/_all-skins.less" />
		<?php }else{ ?>
			<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/AdminLTE.css">
				<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/skins/_all-skins.css" />
		<?php }?>

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/ionicons.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/less/skins/_all-skins.less" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/morris/morris.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/css/jquery.fileupload.css">
		
		<script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
		<script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="landingpage">
		<div class="container">
			<nav class="navbar">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">
							<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/logo.png" class="logo"/>
						</a>
					</div>
					<!--
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Page 1</a></li>
						<li><a href="#">Page 2</a></li>
					</ul>-->
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" class="text-primary" data-toggle="modal" data-target="#winRegistro">Regístrate</a></li>
						<li><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#winSesion">Iniciar sesión</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<br />
		<br />
		<div class="container">
			<div class="body">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<h2 class="text-center">Todo listo para empezar a vender tus productos en el bazar</h2>
						<br />
						<br />
						<p class="text-mute text-center">
							VIP es una herramienta que te auxiliará en todos los procesos de venta en tu bazar ¿estás listo para iniciar?
						</p>
					</div>
				</div>
			</div>
		</div>
		<br />
		<br />
		<div class="containerImage">
			<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/negocio1.jpg">
		</div>
		<br />
		<br />
		<div class="container stands">
			<div class="row">
				<div class="col-xs-6 col-sm-5">
					<br />
					<br />
					<h3>Vende lo que quieras y toma el control de tu bazar</h3>
					<p class="text-mute">Con VIP tienes el control de tu inventario al cual podrás acceder desde cualquier dispositivo movil o computadora permitiendo que el proceso de venta se realice con facilidad
					</p>
				</div>
				<div class="col-xs-6 col-sm-5 col-sm-offset-2">
					<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/stand1.jpg" class="img-responsive"/>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-6 col-sm-5">
					<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/stand2.jpg" class="img-responsive"/>
				</div>
				<div class="col-xs-6 col-sm-5 col-sm-offset-2">
					<br />
					<br />
					<h3>Tu bazar, tu imagen</h3>
					<p class="text-mute">Conoce VIP y personalizalo de acuerdo a tus necesidades de imagen</p>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<hr />
				<div class="row">
					<div class="col-xs-6 text-left redesSociales">
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-facebook fa-stack-1x fa-inverse" aria-hidden="true"></i>
							</span>
						</a>
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x fa-inverse" aria-hidden="true"></i>
							</span>
						</a>
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-envelope-o fa-stack-1x fa-inverse" aria-hidden="true"></i>
							</span>
						</a>
					</div>
					<div class="col-xs-6 text-right ligasInteres">
						<a href="terminos">Términos de servicio</a>
						<a href="proliticaPrivacidad">Política de privacidad</a>
					</div>
				</div>
			</div>
		</footer>
		
		
		<div id="winSesion" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Iniciar sesión</h4>
					</div>
					<div class="modal-body">
						<form action="#" id="frmLogin" method="post">
							<center><img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/logo.png" class="img-responsive"/></center>
							<br />
							<div class="form-group has-feedback">
								<input type="text" class="form-control" placeholder="Email" id="txtUsuario" name="txtUsuario">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input type="password" class="form-control" placeholder="Contraseña" id="txtPass" name="txtPass">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
							<div class="row">
								<!-- /.col -->
								<div class="col-xs-12">
									<button type="submit" class="btn btn-danger btn-block">Iniciar</button>
								</div><!-- /.col -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div id="winRegistro" class="modal fade" role="dialog">
			<form action="#" id="frmRegistro" method="post" class="form-horizontal" onsubmit="javascript: return false;">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Registrate</h4>
						</div>
						<div class="modal-body">
							<center><img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/logo.png" class="img-responsive"/></center>
							<br />
							<div class="form-group">
								<label for="txtRazonSocial" class="col-sm-4">Razón social</label>
								<div class="col-sm-8">
									<input class="form-control" id="txtRazonSocial" name="txtRazonSocial">
								</div>
							</div>
							<div class="form-group">
								<label for="txtNombre" class="col-sm-4">Nombre del usuario</label>
								<div class="col-sm-8">
									<input class="form-control" id="txtNombre" name="txtNombre">
								</div>
							</div>
							<div class="form-group">
								<label for="txtEmail" class="col-sm-4">Correo electrónico</label>
								<div class="col-sm-8">
									<input class="form-control" type="email" id="txtEmail" name="txtEmail">
								</div>
							</div>
							<div class="form-group">
								<label for="txtPass" class="col-sm-4">Contraseña</label>
								<div class="col-sm-8">
									<input class="form-control" type="password" id="txtPassRegistro" name="txtPassRegistro">
								</div>
							</div>
							<div class="form-group">
								<label for="txtConfirmar" class="col-sm-4">Confirmar</label>
								<div class="col-sm-8">
									<input class="form-control" type="password" id="txtConfirmar" name="txtConfirmar">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Registrarme</button>
							<button type="cancel" class="btn btn-secondary btn-right" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<div id="winTarjeta" class="modal fade" role="dialog">
			<form action="#" id="frmTarjeta" method="post" class="form-horizontal" onsubmit="javascript: return false;">
				<div class="modal-dialog  modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Registra una tarjeta</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-info">
								<p>La tarjeta registrada será utilizada al momento de generar el cargo por el uso de la plataforma</p>
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
								<div class="col-lg-3">
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
								<div class="col-lg-3">
									<select id="selAnio" name="selAnio" data-openpay-card="expiration_year" class="form-control">
										<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? date("Y")+10+1 - (date("Y")) : date("Y")-(date("Y")+10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = date("Y"), $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
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
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Guardar</button>
							<button type="cancel" class="btn btn-secondary btn-right" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
    
	    <!-- jQuery 2.1.4 -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQuery/jQuery-2.1.4.min.js"></script>
	    <!-- jQuery UI 1.11.4 -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQueryUI/jquery-ui.min.js"></script>
	    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQueryUI/jquery-ui.css">
	    <!-- Bootstrap 3.3.5 -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
bootstrap/js/bootstrap.min.js"></script>
	    <!-- Morris.js charts -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/raphael-min.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/morris/morris.min.js"></script>
	    <!-- Sparkline -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/sparkline/jquery.sparkline.min.js"></script>
	    <!-- jvectormap -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	    <!-- jQuery Knob Chart -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/knob/jquery.knob.js"></script>
	    <!-- daterangepicker -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/daterangepicker/daterangepicker.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
moment.min.js"></script>
	    <!-- datepicker -->
	
	    <!-- Bootstrap WYSIHTML5 -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	    <!-- Slimscroll -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/slimScroll/jquery.slimscroll.min.js"></script>
	    <!-- FastClick -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/fastclick/fastclick.min.js"></script>
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.es.js"></script>
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.js"></script>
	    
	    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.css">
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/jquery.dataTables.min.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.min.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/lenguaje/ES-mx.js"></script>
	    
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	    
	    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/js/jquery.iframe-transport.js"></script>
	    <!-- The basic File Upload plugin -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/js/jquery.fileupload.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/js/jquery.fileupload-proccess.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/js/jquery.fileupload-ui.js"></script>
	    
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/bootstrap-datepicker.js"></script>
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
	    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/datepicker3.css" />
	     
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/input-mask/jquery.inputmask.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/input-mask/jquery.inputmask.extensions.js"></script>
	    
	    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/colorpicker/bootstrap-colorpicker.css" />
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/colorpicker/bootstrap-colorpicker.js"></script>
	    
	    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/timepicker/bootstrap-timepicker.css" />
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/timepicker/bootstrap-timepicker.js"></script>
	    
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/app.js" type="text/javascript"></script>
	    
	    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/css/bootstrap-select.min.css">
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/js/i18n/defaults-es_CL.min.js"></script>
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/treegrid/css/jquery.treegrid.css" />
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/treegrid/js/jquery.treegrid.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/treegrid/js/jquery.treegrid.bootstrap3.js"></script>
	    
	    <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PAGE']->value['scriptsJS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
?m=<?php echo rand();?>
"></script>
		<?php } ?>
	    
	    <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['debug']){?>
	    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
	    <?php }else{ ?>
		    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	    <script>
	      $.widget.bridge('uibutton', $.ui.button);
	    </script>
	    <?php }?>
	  </body>
</html>
<?php }} ?>