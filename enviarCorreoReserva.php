<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	

	<link rel="stylesheet" type="text/css" href="engine0/style.css"></link>
	<link rel"icon" type"image/png" src="css/img/favicon.png"></link>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<script type="text/javascript" href="engine0/jquery.js"></script>
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
		<br></br>
		<div id="contenedorCuerpo">
			<?php 
  				//comenzamos recogiendo los datos
				function recogeDato($campo){ 
     				return isset($_REQUEST[$campo])?$_REQUEST[$campo]:'';
 				} //la funci�n recogeDatos comprueba si se ha recibido un dato y recoge su valor
  
 				//si no se ha recibido, le asigna un valor vac�o.
 				$nombre  = recogeDato('nombre');
 				$telefono  = recogeDato('telefono');
 				$correo  = recogeDato('correo');
 				$asunto  = recogeDato('asunto');
 				$mensaje = recogeDato('mensaje');
 				$para="cafebarlosraneros@gmail.com";
 				$algunerror = FALSE;
 				$email_subject = "Contacto desde el sitio web";
				//una vez recogidos, los validamos (campos obligatorios, etc...)

 				if($nombre==''){ //comprobamos que el nombre no haya quedado vac�o
     				$algunerror = TRUE;
     				echo "<h3>No has introducido tu nombre.</h3>\n";
 					}
 
 				if($telefono==''){ //comprobamos que el contenido de la pregunta no est� vac�o
 					$algunerror = TRUE;
 					echo "<h3>El &aacuterea de la consulta no puede quedar en blanco.</h3>\n";
 				}
 
 				if($correo==''){ //validamos los que el email no est� vacio
 					$algunerror = TRUE; //si encontramos un error,mostramos un mensaje
 					echo "<h3>No has introducido tu eMail</h3>\n";
 				}
 
 				if($asunto==''){ //comprobamos que el contenido de la pregunta no est� vac�o
     				$algunerror = TRUE;
     				echo "<h3>Asunto no puede quedar en blanco.</h3>\n";
  				}
  				if($mensaje==''){ //comprobamos que el contenido de la pregunta no est� vac�o
  					$algunerror = TRUE;
  					echo "<h3>El &aacuterea de la consulta no puede quedar en blanco.</h3>\n";
  				}
  
  				if ($algunerror){ //comprobamos si ha habido alg�n error
    				echo "<h3>&nbsp;</p>\n"; //si los hay, se lo indicamos al usuario
    		 		echo "<h3>No se ha podido enviar el mensaje por los errores que se detallan arriba.</h3>\n";
     				echo "<h3>Por favor, vuelve a rellenar el formulario.</h3>\n";
     				echo "<h3><a href='conocenos.php'>Volver al formulario</a></h3>\n";
     
  				}else{
  					
  					$email_message = "Detalles del formulario de contacto:\n\n";
  					$email_message .= "Asunto: " . $asunto . "\n";
					$email_message .= "Nombre: " . $nombre . "\n";
					$email_message .= "Tel�fono: " . $telefono . "\n";
					$email_message .= "E-mail: " . $correo . "\n";
					$email_message .= "Mensaje: " . $mensaje . "\n";
				

     				// Ahora se env�a el e-mail usando la funci�n mail() de PHP
					$headers = 'From: '.$correo."\r\n".
					'Reply-To: '.$correo."\r\n" .
					'X-Mailer: PHP/' . phpversion();
					if(mail($para, $asunto, $email_message, $headers)){

     					echo "<h3>Tu mensaje se ha enviado correctamente. Gracias por contactar con nosotros.</h3>\n";
     					echo "<h3>Nos pondremos en contacto lo antes posible.</h3>\n";
     					echo "$para";
     					echo "$telefono";
     				}else{
							echo ErrorException;
						}
  				}
  				echo $correo;
?>
			
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>	
</body>
</html>






