<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
<!-- Start WOWSlider.com HEAD section -->
<!-- add to the <head> of your page -->

<link rel="stylesheet" type="text/css" href="engine0/style.css" />

<script type="text/javascript" src="engine0/jquery.js"></script>

<!-- End WOWSlider.com HEAD section -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
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
		<div id="contenedorCuerpo">
			<div class="evento">
			<?php 
			
			if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
				echo '<!-- Formulario para creacion de album -->
					<form action="confirmarCreacionAlbum.php" class="formularios" method="POST" enctype="multipart/form-data" >
					<div><a>Nombre de &aacute;lbum</a><br/><input type="text" name="nombreAlbum" id="nick"></input></div>
					<div><a>Seleccione fotos</a><br/>  <input name="fotos[]" type="file" multiple="multiple" accept="image/*" /></div>
					<div><input type="submit" value="Crear &aacute;lbum"></input></div>
				</form>';
			}else{
				header ( "Location: index.php" );
			}
			?>
				
				<?php
// 				session_start ();
// 				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
// 					require_once 'Zend/Loader.php';
					
// 					Zend_Loader::loadClass ( 'Zend_Gdata_Photos' );
// 					Zend_Loader::loadClass ( 'Zend_Gdata_Photos_AlbumQuery' );
// 					Zend_Loader::loadClass ( 'Zend_Gdata_ClientLogin' );
// 					Zend_Loader::loadClass ( 'Zend_Gdata_AuthSub' );
					
// 					$user = "webraneros@gmail.com";
// 					$pass = "raneros2014!";
				
// 					$service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
// 					$client = Zend_Gdata_ClientLogin::getHttpClient ( $user, $pass, $service );
// 					$service = new Zend_Gdata_Photos ( $client );
// 					$gp = new Zend_Gdata_Photos ( $client, "Raneros" );
// 					//Creando album
// 					$entry = new Zend_Gdata_Photos_AlbumEntry();
// 					$entry->setTitle($gp->newTitle("Album de prueba"));

// // 					$createdEntry = $gp->insertAlbumEntry($entry);
// 				} else {
// 					echo "Usted no esta autorizado para acceder a esta pagina";
// 				}
// 				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>