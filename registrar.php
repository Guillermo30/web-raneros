<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<!-- End WOWSlider.com HEAD section --></head>
	
	<script type="text/javascript" src="scripts/validacion.js"></script>	

<body>
	<div id="contenido">
		  <?php include('php/cabecera.php');?>
		<div id="menuID" class="menu">
			<?php 
				include('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
				
			?>
		</div>
		<br></br>
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
					<div> <input type="checkbox" name="correoUsu"   checked>Deseo recibir los correo de este sitio<br> 
					</div> 
					<div><button type="button" value="Enviar" onclick="comprobar()">Enviar Registro</button></div>
					<div><button type="reset" value="reset">Limpiar</button></div>
				</form>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
</body>
</html>