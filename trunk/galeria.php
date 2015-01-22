<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title> <!-- Start WOWSlider.com HEAD section -->
	<!-- add to the <head> of your page -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

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
				
				// Listar los albumes
				try {
					$userFeed = $gp->getUserFeed ( "default" );
					
					if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
						echo "<a href='crearAlbum.php'>";
						echo "<div class='albumGaleria'>";
						echo "<img  width='160px' height='175px' src='css/img/agregar.png'><br/>";
						echo "</div>";
						echo "</a>";
					}
					foreach ( $userFeed as $userEntry ) {
						echo "<a href='verAlbum.php?albumId=" . urlencode ( $userEntry->GphotoId ) . "'>";
						echo "<div class='albumGaleria'>";
						
						//Para mostrar las caratulas
						$query = $gp->newAlbumQuery();
						$query->setUser("default");
						$query->setAlbumId( $userEntry->GphotoId);
						$albumFeed = $gp->getAlbumFeed($query);
						foreach ($albumFeed as $albumEntry) {
								
							$mediaArray = $albumEntry->getMediaGroup()->getContent();
							$ImageUrl = $mediaArray[0]->getUrl();
							
							
							echo "<img  width='160px' height='120px' src='".$ImageUrl."'><br/>";
							break;
								
						}
						
// 						echo "<img  width='160px' height='120px' src='css/img/sinImagen.jpg'><br/>";
						if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
							
							echo "<a href='eliminarAlbum.php?id=" . $userEntry->GphotoId . "'><img src='css/img/eliminar.png' width='16px'/></a>";
						}
						
						echo "<br/>";
						echo "<a href=''>";
						echo $userEntry->title->text . "<br />\n";
						echo "</a>";
						echo "</div>";
						echo "</a>";
					}
				} catch ( Zend_Gdata_App_HttpException $e ) {
					echo "Error: " . $e->getMessage () . "<br />\n";
					if ($e->getResponse () != null) {
						echo "Body: <br />\n" . $e->getResponse ()->getBody () . "<br />\n";
					}
					// In new versions of Zend Framework, you also have the option
					// to print out the request that was made. As the request
					// includes Auth credentials, it's not advised to print out
					// this data unless doing debugging
					// echo "Request: <br />\n" . $e->getRequest() . "<br />\n";
				} catch ( Zend_Gdata_App_Exception $e ) {
					echo "Error: " . $e->getMessage () . "<br />\n";
				}
				
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>