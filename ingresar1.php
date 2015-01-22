<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link type="text/javascript" src="scripts/validacion.js"></link>
	<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!--  HEAD section -->
</head>
<script type="text/javascript" src="scripts/funciones.js">
	
</script>
<body>
	<div id="contenido">
		  <?php include('php/cabecera.php');?>
		<div id="menuID" class="menu">
			<?php 
				include ('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
				
				if(isset($_SESSION['nick'])){
					echo "Usuario ". $_SESSION['nick']." conectado";
				}else{
					echo "NO CONECTADO";
				}
			?>
		</div>
		<div id="contenedorCuerpo">
			<div class="evento">
				<form action="conexion.php" class="formularios" method="post" >
					<div><a>Nick</a></br><input type="text" name="nick" id="nick"></input></div>
					<div><a>Contraseña</a></br><input type="password" name="password" id="password"/></div>
					<div><input type="submit" value="Enviar"></input></div>
					<div><button type="button" onclick="location.href='registrar.php'">Registrate</button></div>
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
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>