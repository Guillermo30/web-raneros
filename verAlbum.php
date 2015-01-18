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
		<br></br>
		<div id="contenedorCuerpo">
			<div class="evento">
				<?php
				
				// Autenticacion
				require_once 'Zend/Loader.php';
				
				Zend_Loader::loadClass ( 'Zend_Gdata_Photos' );
				Zend_Loader::loadClass ( 'Zend_Gdata_ClientLogin' );
				Zend_Loader::loadClass ( 'Zend_Gdata_AuthSub' );
				
				$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
				$user = "webraneros@gmail.com";
				$pass = "raneros2014!";
				$client = Zend_Gdata_ClientLogin::getHttpClient ( $user, $pass, $serviceName );
				// update the second argument to be CompanyName-ProductName-Version
				$gp = new Zend_Gdata_Photos ( $client, "Raneros" );
				// In version 1.5+, you can enable a debug logging mode to see the
				// underlying HTTP requests being made, as long as you're not using
				// a proxy server
				// $gp->enableRequestDebugLogging('/tmp/gp_requests.log');
				
				// Obtenemos el nombre del album
				$album = $_GET ['albumId'];
				
				// Creates a Zend_Gdata_Photos_AlbumQuery
				$query = $gp->newAlbumQuery ();
				$query->setUser ( "default" );
				$query->setAlbumId ( $album );
				$albumFeed = $gp->getAlbumFeed ( $query );
				
				// Si el usuario es admin puede agregar fotos al album.
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
					echo "<a href='agregarFotoAlbum.php?id=" . $album . "'>";
					echo "<div class='imagenGaleria'>";
					echo "<img  width='160px' height='170px' src='css/img/agregar.png'><br/>";
					echo "</div>";
					echo "</a>";
				}
				
				$cont=0;
				
				foreach ( $albumFeed as $albumEntry ) {
					if($cont>0){
					$mediaArray = $albumEntry->getMediaGroup ()->getContent ();
					$ImageUrl = $mediaArray [0]->getUrl ();
					if (isset ( $_GET ['photo'] ) && $_GET ['photo'] == $ImageUrl) {
						if ($ImageUrl == $_GET ['photo']) {
							$albumEntry->delete ();
							header ( "Location: verAlbum.php?albumId=$album" );
						}
					}
					echo "<div class='imagenGaleria'>";
					echo "<img  width='170px' height='170px' src='$ImageUrl'><br/>";
					if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
						echo "<a href='verAlbum.php?photo=" . $ImageUrl . "&albumId=" . $album . "'><img src='css/img/eliminar.png' width='16px'/>";
					}
					echo "</a>";
					echo "</div>";
					}
				$cont++;
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