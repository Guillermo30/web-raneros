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
				// session_start();
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
					$borrar = false;
					include ('php/constantesConexion.php');
					// include('php/conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
					
					$sql = new conexionSQL (); // instanciamos objeto de la clase creada en el fichero "conexionSQL"
					                           // Al intentar hacer la conexion con el fichero conexionSQL me daba algun tipo de fallo
					                           // que no he podio resolver nose por que
					                           // $sql = new mysqli($host, $usuario,$passwd,$bd);
					$idAlbum = $_GET ['id'];
					$sentencia = "SELECT * FROM album WHERE nombre=$idAlbum";
					$consulta = $sql->selectSQL ( $sentencia );
					// $consulta=$sql->query($sentencia);
					$contador = 0;
					while ( $row = mysqli_fetch_array ( $consulta, MYSQLI_ASSOC ) ) {
						// echo $row['idAlbum'];
						$contador ++;
						
						$sentencia2 = "SELECT * FROM evento WHERE album_idAlbum={$row['idAlbum']}";
						 
						$consulta2 = $sql->selectSQL ( $sentencia2 );
						// $consulta=$sql->query($sentencia);
						
						while ( $row2 = mysqli_fetch_array ( $consulta2, MYSQLI_ASSOC ) ) {
							$idEvento=$row2['idEvento'];
							
					 							
						}
						
						
					}
					if ($contador == 0) {
						$borrar = true;
					}
					
					if ($borrar) {
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
						header ( "Location: galeria.php" );
					} else {
						
						echo "<center>Album vinculado a un evento,quiere borrar el evento?<br/>";
						echo "<a href='eliminarEventoAlbum.php?idEvento=".$idEvento."&id=".$idAlbum."'><img width='25px' src='css/img/aceptar.png'/></a>";
						echo "<a href='galeria.php'>&nbsp;&nbsp;&nbsp;<img width='25px' src='css/img/eliminar.png'/></a> </center>";
					}
				} else {
					echo "Usted no esta autorizado para acceder a esta pagina";
				}
				
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
</body>
</html>