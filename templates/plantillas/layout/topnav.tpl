<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>.:: {$PAGE.empresaAcronimo} ::.</title>
		{if $PAGE.debug}
			<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/AdminLTE.less" />
			<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/skins/_all-skins.less" />
		{else}
			<link rel="stylesheet" href="{$PAGE.ruta}dist/css/AdminLTE.css">
				<link rel="stylesheet" type="text/css" href="{$PAGE.ruta}dist/css/skins/_all-skins.css" />
		{/if}

		<link rel="stylesheet" href="{$PAGE.ruta}bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/ionicons.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/skins/_all-skins.less" />
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/morris/morris.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/upload/css/jquery.fileupload.css">
		
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
							<img src="{$PAGE.ruta}img/logo.png" class="logo"/>
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
						<h2 class="text-center">Todo listo para empezar a vender tus productos en Bazares y Mercados</h2>
						<br />
						<br />
						<p class="text-mute text-center">
							VIP es la herramienta ideal que te auxiliará en todos los procesos comerciales en bazares y mercado
						</p>
						
						<p class="text-mute text-center">
						- Control de Ventas<br />
						- Control de Inventarios<br />
						- Control de Pedidos</p>
						<br />
						<p class="text-center"><b>¿Estás listo para iniciar?</b></p>
					</div>
				</div>
			</div>
		</div>
		<br />
		<br />
		<div class="containerImage">
			<img class="img-responsive" src="{$PAGE.ruta}img/negocio1.jpg">
		</div>
		<br />
		<br />
		<div class="container stands">
			<div class="row">
				<div class="col-xs-6 col-sm-5">
					<br />
					<br />
					<h3>Vende lo que quieras y toma el control de tu bazar o mercado</h3>
					<p class="text-mute">
					Con VIP tienes el control de tus <b>V</b>entas, <b>I</b>nventarios y <b>P</b>edidos a los cuales podrás acceder desde cualquier dispositivo móvil o computadora permitiendo una información siempre actualizada, estés donde estés.
					</p>
					<p class="text-mute">
					Además de poder mandar notas de ventas personalizadas, te facilitará el proceso de identificación de la cobranza gracias a su módulo "Método de cobro" (Efectivo, banco, terminal bancaria y /o virtuales). Lo único que necesitas es acceso a internet desde cualquier dispositivo.
					</p>
				</div>
				<div class="col-xs-6 col-sm-5 col-sm-offset-2">
					<img src="{$PAGE.ruta}img/stand1.jpg" class="img-responsive"/>
				</div>
			</div>
			<br />
			<br />
			<br />
			<div class="row">
				<div class="col-xs-6 col-sm-5">
					<img src="{$PAGE.ruta}img/stand2.jpg" class="img-responsive"/>
				</div>
				<div class="col-xs-6 col-sm-5 col-sm-offset-2">
					<h3>¡Una herramienta para la cobranza y la conciliación bancaria!</h3>
					<p class="text-mute"><b>¡Sin cuota fija!</b> Pagarás una comisión muy baja de 0.5% únicamente sobre las ventas que realices (es decir 50cts por cada 100 pesos de venta).</p>
					<p class="text-mute"><b>¡Muy fácil de usar y configurar!</b> En tres pasos sencillos podrás configurar tu VIPSystem. Te costará $1.00 pesos. Luego, tendrás acceso a videos tutoriales muy cortos que te guiarán en cada una de las etapas del proceso</b>
					<p class="text-mute"><b>Soporte telefónico</b> 7/7 24/24 al 01800-286 9734</p>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<hr />
				<div class="row">
					<div class="col-xs-6 text-left redesSociales">
						<a href="https://www.facebook.com/vipsystemmexico/">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-facebook fa-stack-1x fa-inverse" aria-hidden="true"></i>
							</span>
						</a>
						<a href="https://twitter.com/VipSystemMexico">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x fa-inverse" aria-hidden="true"></i>
							</span>
						</a>
						<a href="mailto:info@vipsystem.store">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-envelope-o fa-stack-1x fa-inverse" aria-hidden="true"></i>
							</span>
						</a>
					</div>
					<div class="col-xs-6 text-right ligasInteres">
						<a href="#" data-toggle="modal" data-target="#winTerminosCondiciones">Términos de servicio</a>
						<a href="#" data-toggle="modal" data-target="#winAvisoPrivacidad">Política de privacidad</a>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<img src="{$PAGE.ruta}img/googleplay.png" style="width: 159px;"/>
						<img src="{$PAGE.ruta}img/appstore.png" style="width: 159px;"/>
						<img src="{$PAGE.ruta}img/compraLocal.jpg" style="width: 50px;"/>
					</div>
					<div class="col-xs-6 text-right">
						<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=wUG52RBzjqoqi5UEOJom08bIuhoWMDsjMtIQHxNemUzMVWzmm3wqW3mixqb0"></script></span>
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
							<center><img src="{$PAGE.ruta}img/logo.png" class="img-responsive"/></center>
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
							<center><img src="{$PAGE.ruta}img/logo.png" class="img-responsive"/></center>
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
		
		<div id="winTerminosCondiciones" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Términos y condiciones</h4>
					</div>
					<div class="modal-body">
						{include file=$PAGE.rutaModulos|cat:"modulos/terminosCondiciones.tpl"}
					</div>
				</div>
			</div>
		</div>
		
		<div id="winAvisoPrivacidad" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Política de privacidad</h4>
					</div>
					<div class="modal-body">
						{include file=$PAGE.rutaModulos|cat:"modulos/avisoPrivacidad.tpl"}
					</div>
				</div>
			</div>
		</div>
    
	    <!-- jQuery 2.1.4 -->
	    <script src="{$PAGE.ruta}plugins/jQuery/jQuery-2.1.4.min.js"></script>
	    <!-- jQuery UI 1.11.4 -->
	    <script src="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.min.js"></script>
	    <link rel="stylesheet" href="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.css">
	    <!-- Bootstrap 3.3.5 -->
	    <script src="{$PAGE.ruta}bootstrap/js/bootstrap.min.js"></script>
	    <!-- Morris.js charts -->
	    <script src="{$PAGE.ruta}plugins/raphael-min.js"></script>
	    <script src="{$PAGE.ruta}plugins/morris/morris.min.js"></script>
	    <!-- Sparkline -->
	    <script src="{$PAGE.ruta}plugins/sparkline/jquery.sparkline.min.js"></script>
	    <!-- jvectormap -->
	    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	    <!-- jQuery Knob Chart -->
	    <script src="{$PAGE.ruta}plugins/knob/jquery.knob.js"></script>
	    <!-- daterangepicker -->
	    <script src="{$PAGE.ruta}plugins/daterangepicker/daterangepicker.js"></script>
	    <script src="{$PAGE.ruta}moment.min.js"></script>
	    <!-- datepicker -->
	
	    <!-- Bootstrap WYSIHTML5 -->
	    <script src="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	    <!-- Slimscroll -->
	    <script src="{$PAGE.ruta}plugins/slimScroll/jquery.slimscroll.min.js"></script>
	    <!-- FastClick -->
	    <script src="{$PAGE.ruta}plugins/fastclick/fastclick.min.js"></script>
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.es.js"></script>
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
	    
	    <link rel="stylesheet" href="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.css">
	    <script src="{$PAGE.ruta}plugins/datatables/jquery.dataTables.min.js"></script>
	    <script src="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.min.js"></script>
	    <script src="{$PAGE.ruta}plugins/datatables/lenguaje/ES-mx.js"></script>
	    
	    <script src="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	    
	    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	    <script src="{$PAGE.ruta}plugins/upload/js/jquery.iframe-transport.js"></script>
	    <!-- The basic File Upload plugin -->
	    <script src="{$PAGE.ruta}plugins/upload/js/jquery.fileupload.js"></script>
	    <script src="{$PAGE.ruta}plugins/upload/js/jquery.fileupload-proccess.js"></script>
	    <script src="{$PAGE.ruta}plugins/upload/js/jquery.fileupload-ui.js"></script>
	    
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/bootstrap-datepicker.js"></script>
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
	    <link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css" />
	     
	    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.js"></script>
	    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.extensions.js"></script>
	    
	    <link rel="stylesheet" media="screen" type="text/css" href="{$PAGE.ruta}plugins/colorpicker/bootstrap-colorpicker.css" />
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/colorpicker/bootstrap-colorpicker.js"></script>
	    
	    <link rel="stylesheet" media="screen" type="text/css" href="{$PAGE.ruta}plugins/timepicker/bootstrap-timepicker.css" />
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/timepicker/bootstrap-timepicker.js"></script>
	    
	    <script src="{$PAGE.ruta}dist/js/app.js" type="text/javascript"></script>
	    
	    <link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-select/css/bootstrap-select.min.css">
	    <script src="{$PAGE.ruta}plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
		<script src="{$PAGE.ruta}plugins/bootstrap-select/js/i18n/defaults-es_CL.min.js"></script>
		
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/treegrid/css/jquery.treegrid.css" />
		<script type="text/javascript" src="{$PAGE.ruta}plugins/treegrid/js/jquery.treegrid.js"></script>
		<script type="text/javascript" src="{$PAGE.ruta}plugins/treegrid/js/jquery.treegrid.bootstrap3.js"></script>
	    
	    {foreach from=$PAGE.scriptsJS item=script}
			<script type="text/javascript" src="{$script}?m={rand()}"></script>
		{/foreach}
	    
	    {if $PAGE.debug}
	    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
	    {else}
		    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	    <script>
	      $.widget.bridge('uibutton', $.ui.button);
	    </script>
	    {/if}
	  </body>
</html>
