<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title> <!-- Start WOWSlider.com HEAD section -->
	<!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<!-- End WOWSlider.com HEAD section -->

</head>

<script type="text/javascript" src="scripts/popup.js"></script>

<body>
	<div id="contenido">
		  <?php include('php/cabecera.php');?>
		<div id="menuID" class="menu">
			<?php
			include ('php/menu.php');
			$menu = new menu ();
			$menu->mostrar ();
			?>
		</div>
		<br></br>
		<div id="contenedorCuerpo">
			<div class="evento">
				<?php
				$fechaEvento=$_POST['fecha'];
				// Comprueba si es root, en caso contrario devuelve al index
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
				} else {
					header ( 'Location: index.php' );
				}
				
				if (! isset ( $_POST ['nombre'] ))
					$_POST ['nombre'] = "";
				if (! isset ( $_POST ['descripcion'] ))
					$_POST ['descripcion'] = "";
				if (! isset ( $_POST ['date'] ))
					$_POST ['fecha'] = "";
				if (! isset ( $_POST ['hora'] ))
					$_POST ['hora'] = "";
				
				$nombre = $_POST ['nombre']; // Nombre
				$descripcion = $_POST ['descripcion']; // Cuerpo del mensaje
				$fecha = $_POST ['fecha']; // Fecha de la cita
				$hora = $_POST ['hora']; // Hora de la cita
				                         // Concatenar fecha-hora
				$fechaHora = $_POST ['fecha'];
				$fechaHora .= " ";
				$fechaHora .= $_POST ['hora'];
				$foto=$_FILES['foto']['tmp_name'];
				// Creamos album con el nombre del evento
				// Y obtenemos su id para guardarlo en la base de datos
				require_once 'Zend/Loader.php';
				
				Zend_Loader::loadClass ( 'Zend_Gdata_Photos' );
				Zend_Loader::loadClass ( 'Zend_Gdata_Photos_AlbumQuery' );
				Zend_Loader::loadClass ( 'Zend_Gdata_Photos_AlbumEntry' );
				Zend_Loader::loadClass ( 'Zend_Gdata_ClientLogin' );
				Zend_Loader::loadClass ( 'Zend_Gdata_AuthSub' );
				
				$user = "webraneros@gmail.com";
				$pass = "raneros2014!";
				
				$service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
				$client = Zend_Gdata_ClientLogin::getHttpClient ( $user, $pass, $service );
				$service = new Zend_Gdata_Photos ( $client );
				$gp = new Zend_Gdata_Photos ( $client, "Raneros" );
				// Creando album
				$nombreAlbum = $nombre;
				$entry = new Zend_Gdata_Photos_AlbumEntry ();
				$entry->setTitle ( $gp->newTitle ( $nombreAlbum ) );
				
				// La siguiente instruccion crea Album
				$createdEntry = $gp->insertAlbumEntry ( $entry );
				// Devuelve el id del album que se acaba de crear
				// echo $createdEntry->getGphotoId();
				// Insertamos fotos en el album
				
				$username = $user;
				$filename =$foto;
				$photoName = $_FILES ['foto'] ['name'];
				
				$albumId = $createdEntry->getGphotoId ();
				
				$fd = $gp->newMediaFileSource ( $filename );
				$fd->setContentType ( "image/jpeg" );
				
				// Create a PhotoEntry
				$photoEntry = $gp->newPhotoEntry ();
				$photoEntry->setMediaSource ( $fd );
				$photoEntry->setTitle ( $gp->newTitle ( $photoName ) );
				
				// We use the AlbumQuery class to generate the URL for the album
				$albumQuery = $gp->newAlbumQuery ();
				
				$albumQuery->setUser ( $username );
				$albumQuery->setAlbumId ( $albumId );
				
				// We insert the photo, and the server returns the entry representing
				// that photo after it is uploaded
				$insertedEntry = $gp->insertPhotoEntry ( $photoEntry, $albumQuery->getQueryUrl () );
				
				
				// Album creado
				$sql = new conexionSQL ();
				// Comienza a insertar
				// sentecias de insercion
				//Insertamos primero el album procedente de picasa en nuestra tabla de albums
				$sentencia="INSERT INTO album (nombre,idAlbum) VALUES ('{$albumId}','NULL')";
				if(!$sql->insertarSQL($sentencia)){
					echo $sql->mysqli->error;
					echo "</br>";
					echo "Ha ocurrido un error en la insercion del album";
				}
				// Ahora insertamos el Evento con el idalbum
				//Obtenemos el id del album creado de la tabla album
				$sentencia="SELECT * FROM album WHERE nombre=$albumId";
				$consulta=$sql->selectSQL($sentencia);
				 
				echo $fechaEvento=$fechaEvento." ".$hora.":00";
				while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
						
					
					$sentencia = "INSERT INTO evento (nombre, descripcion, fecha,portada,album_idAlbum)
					VALUES ('{$nombre}','{$descripcion}', '{$fechaEvento}','{$photoName}','{$row['idAlbum']}')";
					 
				}
				
				//echo $sentencia . "</br>";
				// echo $sentencia;
				if (! $sql->insertarSQL ( $sentencia )) {
					echo $sql->mysqli->error;
					echo "</br>Ha ocurrido un error al introducir el evento, int&eacutentelo de nuevo";
					//header ( "Refresh: 3;URL=" . $_SERVER ['HTTP_REFERER'] );
				
				} else {
					echo "Evento agregado correctamente";
					header ( "Refresh: 4;URL=eventos.php" );
// 					header ( "Location: eventos.php" );
				}
				
				?>
			</div>
		</div>
		<div id="pie">
			<div id="enlaces">
				<h3>Sitios Relacionados</h3>
				<hr />
				<a href="http://www.museodeterque.com/" title="Museo de Terque">Museo
					de Terque</a>
			</div>
			<div id="contacta">
				<h3>Contacta con nosotros</h3>
				<hr />
				<a>Telf: 622-112-446 </a> <br></br> <a>Direccion: Plaza del la
					Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
		</div>
	</div>
</body>
</html>
