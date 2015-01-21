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
				<br />
				<?php
				include ('php/constantesConexion.php');
				// include('php/conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
				
				$sql = new conexionSQL (); // instanciamos objeto de la clase creada en el fichero "conexionSQL"
				                           // Al intentar hacer la conexion con el fichero conexionSQL me daba algun tipo de fallo
				                           // que no he podio resolver nose por que
				                           // $sql = new mysqli($host, $usuario,$passwd,$bd);
				$sentencia = "SELECT * FROM evento";
				$consulta = $sql->selectSQL ( $sentencia );
				// $consulta=$sql->query($sentencia);
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'])
					echo "<a href='addEvento.php'><label>Agregar un evento nuevo</label></a><br/>";
				while ( $row = mysqli_fetch_array ( $consulta, MYSQLI_ASSOC ) ) {
					
					$sql2 = new conexionSQL ();
					$sentencia2 = "SELECT * FROM evento WHERE idEvento='" . $row ['idEvento'] . "'";
					$consulta2 = $sql2->selectSQL ( $sentencia2 );
					
					while ( $row2 = mysqli_fetch_array ( $consulta2, MYSQLI_ASSOC ) ) {
						
						// echo "<a href='php/evento.php?id=" . $row2 ['idEvento'] . "'>";
						echo "<div class='eventoCaja'>";
						// Sacamos la caratula del evento
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
						
						// Obtenemos el id del album
						 
						$sentencia3 = "SELECT *  FROM album  WHERE idAlbum='" . $row ['album_idAlbum'] . "'";
						 
						$consulta3 = $sql2->selectSQL ( $sentencia3 );
							
						while ( $row3 = mysqli_fetch_array ( $consulta3, MYSQLI_ASSOC ) ) {
						$album=$row3['nombre'];
						}
						// Creates a Zend_Gdata_Photos_AlbumQuery
						$query = $gp->newAlbumQuery ();
						$query->setUser ( "default" );
						$query->setAlbumId ( $album );
						$albumFeed = $gp->getAlbumFeed ( $query );
						
						foreach ( $albumFeed as $albumEntry ) {
							
							$mediaArray = $albumEntry->getMediaGroup ()->getContent ();
							$ImageUrl = $mediaArray [0]->getUrl ();
							break;
							
						}
				
				
				//
				echo "<img  width='200px' height='150px' src='$ImageUrl;'><br/>";
				echo "Nombre de evento: " . $row2 ['nombre'] . "<br/	>";
				echo "Fecha: " . $row2 ['fecha'] . "<br/	>";
				echo "Hora: <br/	>";
				echo "Descripcion de evento:" . $row2 ['descripcion'] . "<br/>";
// 				echo "<a href='verAlbum.php?albumId=".$album."' >Ver fotos de evento	</a><br/>";
				
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
					
					echo " <a href='modificarEvento.php?idEvento=" . $row2 ['idEvento'] . "&nombre=". $row2 ['nombre']."&descripcion=". $row2 ['descripcion']."&fecha=". $row2 ['fecha']."&Album=". $album."'><img src='css/img/iconos/edit.png' class='icon' alt='Modificar Evento'> </a><a href='eliminarEvento.php?id=".$album."&idEvento=" . $row2 ['idEvento'] . "'><img src='css/img/iconos/delete.png' class='icon' alt='Eliminar Evento'> </a></a>";
					echo "</div>";
					echo "</a>";
				} else {
					echo "</div>";
					echo "</a>";
				}
					}
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