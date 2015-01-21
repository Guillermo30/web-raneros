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
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<!-- End WOWSlider.com HEAD section -->
	
	<script type="text/javascript" src="scripts/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="scripts/scrollJQuery.js"></script>
	

</head>

<body>
	<div id="contenido">
	  <?php include('php/cabecera.php');?>
		<div id="menuID" class="menu">
			<?php 
				include ('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
			?>
		</div>
		<!-- <div id="contenedorCuerpo"> -->
			<?php
				
				include('php/constantesConexion.php'); //Incluimos el fichero donde está la clase conexionSQL
				if(isset($_SESSION["esRoot"])){
					echo "<div class=".'"login"'."align=".'"right"'."><a class=".'"login"'.">".$_SESSION['nick']."</a></div>";
					
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
												
						if($clave['esRoot']){
							$_SESSION['esRoot'] = true;
							$_SESSION['nick']=$clave["nick"];
							}
						else {
							
							$_SESSION['esRoot'] = false;
							$_SESSION['id'] = $clave['idusuarios'];
							$_SESSION['nick']=$clave["nick"];
						}
						header("location:index.php");
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
				<a>Telf: 622-112-446 </a>
				<br></br>
				<a>Direccion: Plaza del la Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
		</div>
	</div>
</body>
</html>