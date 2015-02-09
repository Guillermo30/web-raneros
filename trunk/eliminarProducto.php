<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

<link rel="stylesheet" type="text/css" href="engine0/style.css" />

<script type="text/javascript" src="engine0/jquery.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
<!-- End WOWSlider.com HEAD section --></head>

<script type="text/javascript" src="scripts/popup.js"></script>

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
			<div class="evento">
				<?php
					include("php/constantesConexion.php");
					//Comprueba si es root, en caso contrario devuelve al index
					if(isset($_SESSION['esRoot']) && $_SESSION['esRoot'] == 1){
					
					}else{
						header('Location: index.php');
					}
					
					$mysqli = new mysqli($host, $usuario, $passwd, $bd);
				
					$mysqli->query("DELETE FROM `producto` WHERE idProducto=".$_GET['idProducto']);
					//$mysqli->query("DELETE FROM `album` WHERE nombre=".$_GET['id']);
					//Eliminamos tambien el album
					//require_once 'Zend/Loader.php';
					//Zend_Loader::loadClass ( 'Zend_Gdata_Photos' );
					//Zend_Loader::loadClass ( 'Zend_Gdata_Photos_AlbumQuery' );
					//Zend_Loader::loadClass ( 'Zend_Gdata_ClientLogin' );
					//Zend_Loader::loadClass ( 'Zend_Gdata_AuthSub' );
					
					//$user = "webraneros@gmail.com";
					//$pass = "raneros2014!";
					
					//$id = $_GET ['id'];
					//$service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
					//$client = Zend_Gdata_ClientLogin::getHttpClient ( $user, $pass, $service );
					//$service = new Zend_Gdata_Photos ( $client );
					//$albumQuery = new Zend_Gdata_Photos_AlbumQuery ();
					// $albumQuery->setUser("sample.user");
					
					//$albumQuery->setAlbumId ( $id );
					// $albumQuery->setType('entry');
					
					//$entry = $service->getAlbumEntry ( $albumQuery );
					
					//$service->deleteAlbumEntry ( $entry, true );
					//
					header ( "Location: productos.php" );
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>
