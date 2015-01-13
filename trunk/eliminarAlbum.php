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
					session_start();
					if(isset($_SESSION['esRoot'])&& $_SESSION['esRoot']==1){
						require_once 'Zend/Loader.php';
							
						Zend_Loader::loadClass('Zend_Gdata_Photos');
						Zend_Loader::loadClass('Zend_Gdata_Photos_AlbumQuery');
						Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
						Zend_Loader::loadClass('Zend_Gdata_AuthSub');
						
						$user = "webraneros@gmail.com";
						$pass = "raneros2014!";
					
						$id=$_GET['id'];
						$service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
						$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
						$service = new Zend_Gdata_Photos($client);
 						$albumQuery = new Zend_Gdata_Photos_AlbumQuery;
// 						$albumQuery->setUser("sample.user");
						
						$albumQuery->setAlbumId($id);
// 						$albumQuery->setType('entry');
						
						$entry = $service->getAlbumEntry($albumQuery);
						
						$service->deleteAlbumEntry($entry, true);
						
					}else{
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