<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section --></head>
	
	<script type="text/javascript" src="scripts/validacion.js"></script>	

<body>
	<div id="contenido">
		<div id="cabecera">
			<img src="css/img/BannerVerde.jpg" id="fondoCabecera">
			<div id="titleHeader">
				<img src="css/img/icono-rana.png" id="logo" width="90px" height="90px">
				<h1>Los Raneros</h1>
				<h3>Cafe Bar</h3>
			</div>
			<div id="redesSociales">
				<div id="redesTitle">
					<h3>Social Links</h3>
				</div>
				<div id="redesLinks">
					<img src="css/img/iconos/facebook.png" class="logoSocial">
					<img src="css/img/iconos/twitter.png" class="logoSocial">
				</div>
			</div>
		</div>
		<div id="menuID" class="menu">
			<?php 
				include('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
				
			?>
		</div>
		<div id="contenedorCuerpo">
			<div class="evento">
				<form action="registrarUsuario.php" class="formularios" name="formularioRegistro" method="post">
					<div>
						<a>Nick</a></br><input type="text" name="nick" id="nick" />
					</div>
					<div>
						<a>Contraseña</a></br><input type="password" name="contrasenia" id="contrasenia"/>
					</div>
					<div>
						<a>Repita la contraseña</a></br><input type="password" name="contrasenia2" id="contrasenia2"/>
					</div>
					<div><a>Nombre</a></br><input type="text" name="nombre" id="nombre" />
					</div>
					<div><a>Apellidos</a></br><input type="text" name="apellidos" id="apellidos" />
					</div>
					<div><a>Correo electronico</a></br><input type="text" name="correo" id="correo" />
					</div> 
					<div><button type="button" value="Enviar" onclick="comprobar()">Enviar Registro</button></div>
					<div><button type="reset" value="reset">Limpiar</button></div>
				</form>
			</div>
		</div>
		<div id="pie">
			<div id="enlaces">
				<h3>Sitios Relacionados</h3>
				<hr/>
				<a href="http://www.museodeterque.com/" title="Museo de Terque">Museo de Terque</a>
			</div>
			<div id="contacta">
				<h3>Contacta con nosotros</h3>
				<hr/>
				<a>Telf: 622-112-446 </a>
				<br></br>
				<a>Direccion: Plaza del la Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
		</div>
	</div>
</body>
</html>