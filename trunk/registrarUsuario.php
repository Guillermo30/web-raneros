<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link type="text/javascript" src="scripts/validacion.js"></link>
	<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section -->
</head>
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
					<ul>
						<li>
							<a href="index.html">Inicio</a>
						</li>
						<li>
							<a href="galeria.html">Galeria</a>
						</li>
						<li>
							<a href="eventos.html">Eventos</a>
						</li>
						<li>
							<a href="carta.html">Carta</a>
						</li>
						<li>
							<a href="productos.html">Productos</a>
						</li>
						<li>
							<a href="conocenos.html">Conocenos</a>
						</li>
						<li>
							<a href="ingresar.html">Ingresar</a>
						</li>
					</ul>
		</div>
		<div id="contenedorCuerpo">
			<?php
				$newPassword = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
				$mysqli = new mysqli("localhost", "root", "", "raneros");
				if ($mysqli->connect_errno) {
					echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}
				$consulta = "INSERT INTO `usuario`(`nombre`, `apellidos`, `nick`, `password`, `esRoot`) VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['nick']."','".$newPassword."', False)";
				if($mysqli->query($consulta))
					echo "<h2>Los Raneros nos enorgullece darte la vienvenido</h2>";
				else
				{
					echo "<p>Por motimos de mantenimiento no hemos podido atender tu solicitud. Intentelo más tarde y disculpe las molestias.</p>";
					echo $consulta;
				} 
			?>
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
				<a>Telf: XXX XXX XXX</a>
				<br></br>
				<a>Direccion: XXXXXXXXXXX</a>
			</div>
		</div>
	</div>
</body>
</html>