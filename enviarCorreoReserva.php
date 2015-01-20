<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!--  HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css"></link>

	<script type="text/javascript" href="engine0/jquery.js"></script>
	
	<link rel"icon" type"image/png" src="css/img/favicon.png"></link>

	<!-- HEAD section -->
	
	<script type="text/javascript" src="scripts/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="scripts/scrollJQuery.js"></script>
	

</head>

<body>
	<div id="contenido">
		<div id="cabecera">
			<img src="css/img/BannerVerde.jpg" id="fondoCabecera">
			<div id="titleHeader">
				<img src="css/img/rana-coloreada.gif" id="logo" width="140px" height="90px">
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
		<br></br>
		<div id="contenedorCuerpo">
			<?php 
  				//comenzamos recogiendo los datos
				function recogeDato($campo){ 
     				return isset($_REQUEST[$campo])?$_REQUEST[$campo]:'';
 				} //la función recogeDatos comprueba si se ha recibido un dato y recoge su valor
  
 				//si no se ha recibido, le asigna un valor vacío.
 				$nombre    = recogeDato('nombre');
 				$correo    = recogeDato('telefono');
 				$correo    = recogeDato('correo');
 				$asunto  = recogeDato('asunto');
 				$mensaje = recogeDato('mensaje');
 				$para="cafebarlosraneros@gmail.com";
 				$algunerror = FALSE;
 
				//una vez recogidos, los validamos (campos obligatorios, etc...)

 				if($nombre==''){ //comprobamos que el nombre no haya quedado vacío
     				$algunerror = TRUE;
     				echo "<p class=\"erroneo\">No has introducido tu nombre.</p>\n";
 					}
 
 				if($telefono==''){ //comprobamos que el contenido de la pregunta no esté vacío
 					$algunerror = TRUE;
 					echo "<p class=\"erroneo\">El área de la consulta no puede quedar en blanco.</p>\n";
 				}
 
 				if($correo==''){ //validamos los que el email no esté vacio
 					$algunerror = TRUE; //si encontramos un error,mostramos un mensaje
 					echo "<p class=\"erroneo\">No has introducido tu eMail</p>\n";
 				}
 
 				if($asunto==''){ //comprobamos que el contenido de la pregunta no esté vacío
     			$algunerror = TRUE;
     			echo "<p class=\"erroneo\">Asunto no puede quedar en blanco.</p>\n";
  				}
  				if($mensaje==''){ //comprobamos que el contenido de la pregunta no esté vacío
  					$algunerror = TRUE;
  					echo "<p class=\"erroneo\">El área de la consulta no puede quedar en blanco.</p>\n";
  				}
  
  				if ($algunerror){ //comprobamos si ha habido algún error
    				echo "<p>&nbsp;</p>\n"; //si los hay, se lo indicamos al usuario
    		 		echo "<p>No se ha podido enviar el mensaje por los errores que se detallan arriba.</p>\n";
     				echo "<p>Por favor, vuelve a rellenar el formulario.</p>\n";
     				echo "<p class=\"centrado\">< href=\"conocenos.php\">Volver al formulario</a></p>\n";
     
  				}else{
     				mail($para, $asunto, $mensaje); //y lo enviamos
     				echo "<p>Tu mensaje se ha enviado correctamente. Gracias por contactar con nosotros.</p>\n";
     				echo "<p>Nos pondremos en contacto lo antes posible.</p>\n";
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
				<a>Telf: 622-112-446 </a>
				<br></br>
				<a>Direccion: Plaza del la Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
					
		</div>
	</div>
</body>
</html>






