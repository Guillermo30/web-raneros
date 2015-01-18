<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title> <!-- Start WOWSlider.com HEAD section -->
	<!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section -->

</head>

<script type="text/javascript" src="scripts/popup.js"></script>

<body>
	<div id="contenido">
		<div id="cabecera">
			<img src="css/img/BannerVerde.jpg" id="fondoCabecera">
				<div id="titleHeader">
					<img src="css/img/icono-rana.png" id="logo" width="90px"
						height="90px">
						<h1>Los Raneros</h1>
						<h3>Cafe Bar</h3>
				
				</div>
				<div id="redesSociales">
					<div id="redesTitle">
						<h3>Social Links</h3>
					</div>
					<div id="redesLinks">
						<img src="css/img/iconos/facebook.png" class="logoSocial"> <img
							src="css/img/iconos/twitter.png" class="logoSocial">
					
					</div>
				</div>
		
		</div>
		<div id="menuID" class="menu">
			<?php
			include ('php/menu.php');
			$menu = new menu ();
			$menu->mostrar ();
			?>
		</div>
		<div id="contenedorCuerpo">
			<div class="evento">
			 
				<?php
// 				session_start ();
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
					
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
					$nombreAlbum = $_POST ['nombreAlbum'];
					$entry = new Zend_Gdata_Photos_AlbumEntry ();
					$entry->setTitle ( $gp->newTitle ( $nombreAlbum ) );
					
					//La siguiente instruccion crea Album
					$createdEntry = $gp->insertAlbumEntry($entry);
					//Devuelve el id del album que se acaba de crear
// 					echo $createdEntry->getGphotoId();
					//Insertamos fotos en el a	lbum
					$contador = COUNT ( $_FILES ['fotos'] ['name'] );
				 
					for($i=0;$i<$contador;$i++){
						
									
// 						move_uploaded_file($_FILES['fotos']['tmp_name'][$i],'temporal/'.$_FILES['fotos']['name'][$i]);
						$username = $user;
						$filename = $_FILES ['fotos'] ['tmp_name'] [$i];
						$photoName = $_FILES ['fotos'] ['name'] [$i];
						
						$albumId = $createdEntry->getGphotoId();
							
						$fd = $gp->newMediaFileSource($filename);
						$fd->setContentType("image/jpeg");
							
						// Create a PhotoEntry
						$photoEntry = $gp->newPhotoEntry();
						$photoEntry->setMediaSource($fd);
						$photoEntry->setTitle($gp->newTitle($photoName));
							
						// We use the AlbumQuery class to generate the URL for the album
						$albumQuery = $gp->newAlbumQuery();
							
						$albumQuery->setUser($username);
						$albumQuery->setAlbumId($albumId);
							
						// We insert the photo, and the server returns the entry representing
						// that photo after it is uploaded
						$insertedEntry = $gp->insertPhotoEntry($photoEntry, $albumQuery->getQueryUrl());
						
					}
					
					header ( "Location: galeria.php" );
					// foreach ( $_FILES ['fotos'] ['name'] as $clave => $tmp_name ) {
					// echo "<hr>";
					// echo $_FILES ['fotos'] ['tmp_name'] [$clave];
					// $username = $user;
					// $filename = $clave . $_FILES ['fotos'] ['tmp_name'] [$clave];
					// $photoName = $clave . $_FILES ['fotos'] ['name'] [$clave];
					
					// $albumId = "6103956432412299745";
					
					// $fd = $gp->newMediaFileSource('C:\Users\Zenbook\Pictures\7.jpg');
					// $fd->setContentType("image/jpeg");
					
					// // Create a PhotoEntry
					// $photoEntry = $gp->newPhotoEntry();
					// $photoEntry->setMediaSource($fd);
					// $photoEntry->setTitle($gp->newTitle($photoName));
					
					// // We use the AlbumQuery class to generate the URL for the album
					// $albumQuery = $gp->newAlbumQuery();
					
					// $albumQuery->setUser($username);
					// $albumQuery->setAlbumId($albumId);
					
					// // We insert the photo, and the server returns the entry representing
					// // that photo after it is uploaded
					// $insertedEntry = $gp->insertPhotoEntry($photoEntry, $albumQuery->getQueryUrl());
					
					// }
				} else {
					echo "Usted no esta autorizado para acceder a esta pagina";
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
				<a>Telf: XXX XXX XXX</a> <br></br> <a>Direccion: XXXXXXXXXXX</a>
			</div>
		</div>
	</div>
</body>
</html>