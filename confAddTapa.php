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
					include ('php/constantesConexion.php');
					$mysqli = new mysqli($host, $usuario, $passwd, $bd);
					//Inserta La tapa
					if(!isset($_POST['nombre']))
						$_POST['nombre']="";
					if(!isset($_POST['descripcion']))
						$_POST['descripcion']="";
					if(!isset($_POST['tipoTapa']))
						$_POST['tipoTapa']=1;
					//$sentencia="INSERT INTO `tapa`(`idTapa`, `nombre`, `descripcion`, `tipoTapa_idTipoTapa`) VALUES (NULL,'".$_POST['nombre']."','".$_POST['descripcion']."',".$_POST['tipoTapa'].")";
					$sentencia="INSERT INTO `tapa`(`nombre`, `descripcion`, `tipoTapa_idTipoTapa`) VALUES ('".$_POST['nombre']."','".$_POST['descripcion']."',".$_POST['tipoTapa'].")";
					$mysqli->query($sentencia);
					//Obtenemos la id con la que se agrega la tapa para luego relacionarla con la foto
					$sql = new conexionSQL();
					$idTapa = $sql->ultimaId('tapa');
				
					//Inserta la foto
					$sentencia = "SELECT nombre FROM tipoTapa WHERE idTipoTapa=".$_POST['tipoTapa'];
					$nombreTipoTapa = $mysqli->query($sentencia)->fetch_array()[0];
					$uploaddir = "css/img/tapas/".$nombreTipoTapa."/";
					$uploadfile = $uploaddir . basename($_FILES['foto']['name']);
					
					
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
						//Agrega la entrada en al base de datos de la foto de la tapa
						$sentencia="INSERT INTO `foto`(`idFoto`, `foto`, `album_idAlbum`, `tapa_idtapa`) VALUES (NULL,'".$_FILES['foto']['name']."',1,".$idTapa.")";
						$mysqli->query($sentencia);
						echo "<h1>La tapa a sido añadida con exito</h1>";
					} else {
						$sentencia="DELETE FROM `tapa` WHERE idTapa=".$idTapa."";
						$mysqli->query($sentencia);
					}
					
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
