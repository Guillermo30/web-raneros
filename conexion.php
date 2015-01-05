<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css"></link>

	<script type="text/javascript" href="engine0/jquery.js"></script>
	
	<link rel"icon" type"image/png" src="css/img/favicon.png"></link>

	<!-- End WOWSlider.com HEAD section -->
	
	<script type="text/javascript" src="scripts/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="scripts/scrollJQuery.js"></script>
	

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
					<a href="http://www.facebook.com"><img src="css/img/iconos/facebook.png" class="logoSocial"></a>
					<a href="http://www.twitter.com"><img src="css/img/iconos/twitter.png" class="logoSocial"></a>
				</div>
			</div>
		</div>
		<div id="menuID" class="menu">
			<?php 
				include ('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
			?>
		</div>
		<!-- <div id="contenedorCuerpo"> -->
			<?php
				session_start();
				include('php/constantesConexion.php'); //Incluimos el fichero donde está la clase conexionSQL
				if(isset($_SESSION["esRoot"])){
					echo "<div class=".'"login"'."align=".'"right"'."><a class=".'"login"'.">".$_SESSION['nick']."</a></div>";
					//echo "<div id=".'"idMenu"'."class=".'"login"'."align=".'"right"'."><a class=".'"login"'.">".$_POST["nick"]."</a></div>";
					//echo "<div class=".'"menu"'.">".$_POST["nick"]."</div>";
				}
	            else{
	            //$sql=new mysqli($host, $usuario,$passwd,$bd); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
	            $sql=new conexionSQL();
	            $sentencia="SELECT * FROM usuario WHERE nick = '".$_POST['nick']."'";
				// Comprobar credenciales
             	if($consulta=$sql->selectSQL($sentencia))
				{
					//$clave = $consulta->fetch_assoc();
					$clave = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
					if(password_verify(trim($_POST['password']), $clave["password"]))  //función que valida contraseña con un código hash de la contraseña
					{
						//echo "<div id=".'"idMenu"'."class=".'"menu"'."<li>".$_POST["nick"]."</li></div>";
						//echo "<a class=".'"redesSociales"'.">".$_POST["nick"]."</a>";
						//echo "<h2>Bienvenido ".$_POST['nick']."</h2>";
						//session_start();
						
						if($clave['esRoot']){
							$_SESSION['esRoot'] = true;
							$_SESSION['nick']=$clave["nick"];
							}
						else {
							
							$_SESSION['esRoot'] = false;
							$_SESSION['id'] = $clave['idusuarios'];
							$_SESSION['nick']=$clave["nick"];
						}
						header("location:conexion.php");
					}
					else
					{
						echo "<br/>";
						echo "Fallo contrasenia";
					}
				}
				else
				{
					echo "Fallo nombre";
				}
				}
			?>
		<!-- </div> -->
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