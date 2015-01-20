<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	

	<link rel="stylesheet" type="text/css" href="engine0/style.css"></link>
	<link rel"icon" type"image/png" src="css/img/favicon.png"></link>
	
	<script type="text/javascript" href="engine0/jquery.js"></script>
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
 				$nombre  = recogeDato('nombre');
 				$telefono  = recogeDato('telefono');
 				$correo  = recogeDato('correo');
 				$asunto  = recogeDato('asunto');
 				$mensaje = recogeDato('mensaje');
 				$para="cafebarlosraneros@gmail.com";
 				$algunerror = FALSE;
 				$email_subject = "Contacto desde el sitio web";
				//una vez recogidos, los validamos (campos obligatorios, etc...)

 				if($nombre==''){ //comprobamos que el nombre no haya quedado vacío
     				$algunerror = TRUE;
     				echo "<h3>No has introducido tu nombre.</h3>\n";
 					}
 
 				if($telefono==''){ //comprobamos que el contenido de la pregunta no esté vacío
 					$algunerror = TRUE;
 					echo "<h3>El área de la consulta no puede quedar en blanco.</h3>\n";
 				}
 
 				if($correo==''){ //validamos los que el email no esté vacio
 					$algunerror = TRUE; //si encontramos un error,mostramos un mensaje
 					echo "<h3>No has introducido tu eMail</h3>\n";
 				}
 
 				if($asunto==''){ //comprobamos que el contenido de la pregunta no esté vacío
     				$algunerror = TRUE;
     				echo "<h3>Asunto no puede quedar en blanco.</h3>\n";
  				}
  				if($mensaje==''){ //comprobamos que el contenido de la pregunta no esté vacío
  					$algunerror = TRUE;
  					echo "<h3>El área de la consulta no puede quedar en blanco.</h3>\n";
  				}
  
  				if ($algunerror){ //comprobamos si ha habido algún error
    				echo "<h3>&nbsp;</p>\n"; //si los hay, se lo indicamos al usuario
    		 		echo "<h3>No se ha podido enviar el mensaje por los errores que se detallan arriba.</h3>\n";
     				echo "<h3>Por favor, vuelve a rellenar el formulario.</h3>\n";
     				echo "<h3>< href=\"conocenos.php\">Volver al formulario</a></h3>\n";
     
  				}else{
  					
  					$email_message = "Detalles del formulario de contacto:\n\n";
  					$email_message .= "Asunto: " . $asunto . "\n";
					$email_message .= "Nombre: " . $nombre . "\n";
					$email_message .= "Teléfono: " . $telefono . "\n";
					$email_message .= "E-mail: " . $correo . "\n";
					$email_message .= "Mensaje: " . $mensaje . "\n";
				

     				// Ahora se envía el e-mail usando la función mail() de PHP
					$headers = 'From: '.$correo."\r\n".
					'Reply-To: '.$correo."\r\n" .
					'X-Mailer: PHP/' . phpversion();
					mail($para, $asunto, $email_message, $headers);

     				echo "<h3>Tu mensaje se ha enviado correctamente. Gracias por contactar con nosotros.</h3>\n";
     				echo "<h3>Nos pondremos en contacto lo antes posible.</h3>\n";
     				echo "$para";
     				echo "$telefono";
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






