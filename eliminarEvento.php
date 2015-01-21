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
					//Comprueba si es root, en caso contrario devuelve al index
					if(isset($_SESSION['esRoot']) && $_SESSION['esRoot'] == 1){
					
					}else{
						header('Location: index.php');
					}
					include ('php/constantesConexion.php');
					$mysqli = new mysqli($host, $usuario, $passwd, $bd);
				
					$mysqli->query("DELETE FROM `evento` WHERE idevento=".$_GET['idEvento']);
					$mysqli->query("DELETE FROM `album` WHERE nombre=".$_GET['id']);
					//Eliminamos tambien el album
					require_once 'Zend/Loader.php';
					Zend_Loader::loadClass ( 'Zend_Gdata_Photos' );
					Zend_Loader::loadClass ( 'Zend_Gdata_Photos_AlbumQuery' );
					Zend_Loader::loadClass ( 'Zend_Gdata_ClientLogin' );
					Zend_Loader::loadClass ( 'Zend_Gdata_AuthSub' );
					
					$user = "webraneros@gmail.com";
					$pass = "raneros2014!";
					
					$id = $_GET ['id'];
					$service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
					$client = Zend_Gdata_ClientLogin::getHttpClient ( $user, $pass, $service );
					$service = new Zend_Gdata_Photos ( $client );
					$albumQuery = new Zend_Gdata_Photos_AlbumQuery ();
					// $albumQuery->setUser("sample.user");
					
					$albumQuery->setAlbumId ( $id );
					// $albumQuery->setType('entry');
					
					$entry = $service->getAlbumEntry ( $albumQuery );
					
					$service->deleteAlbumEntry ( $entry, true );
					//
					header ( "Location: eventos.php" );
				?>
			</div>
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
