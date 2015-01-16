<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section --></head>
	
	<script type="text/javascript" src="scripts/popup.js"></script>	

<body>
	<div id="contenido">
		<div id="cabecera">
			<img src="css/img/BannerVerde.jpg" id="fondoCabecera">
			<div id="titleHeader">
				<img src="css/img/icono-rana.png" id="logo" width="90px" height="90px">
				<h1>Los Raneros</h1>
				<h3>Cafe Bar</h3>
			</div>
			<div id="redesSociales">
				<div id="redesTitle">
					<h3>Social Links</h3>
				</div>
				<div id="redesLinks">
					<img src="css/img/iconos/facebook.png" class="logoSocial">
					<img src="css/img/iconos/twitter.png" class="logoSocial">
				</div>
			</div>
		</div>
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
					//Comienza a insertar
					include ('constantesConexion.php');
					$mysqli = new mysqli($host, $usuario, $passwd, $bd);
					//Inserta La tapa
					$sql=new conexionSQL();
					$sentencia="INSERT INTO `tapa`(`idTapa`, `nombre`, `descripcion`, `tipoTapa_idTipoTapa`) VALUES (NULL,".$_POST['nombre'].",".$_POST['descripcion'].",".$_POST['tipoTapa'].")";
					$consulta=$sql->selectSQL($sentencia);
					$idTapa = mysql_insert_id();
				
					//Inserta la foto
					$uploaddir = 'css/img/tapas/';
					$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
					
					echo '<pre>';
					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
						echo "El archivo es válido y fue cargado exitosamente.\n";
						//Agrega la entrada en al base de datos de la foto de la tapa
						$sentencia="INSERT INTO `foto`(`idFoto`, `foto`, `album_idAlbum`, `tapa_idtapa`) VALUES (NULL,".$_FILES['userfile']['tmp_name'].",1,".$idTapa.")";
						$mysqli->query($sentencia);
					} else {
						$sentencia="DELETE FROM `tapa` WHERE idTapa=".$idTapa."";
						$mysqli->query($sentencia);
					}
					
					echo 'Aquí hay más información de depurado:';
					print_r($_FILES);
					
					print "</pre>";
					
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
