<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

<link rel="stylesheet" type="text/css" href="engine0/style.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
<script type="text/javascript" src="engine0/jquery.js"></script>

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
					//Comprueba si a subido una nueva foto
					if(isset($_FILES['foto']['error']) && $_FILES['foto']['error'] == 4){
						$sentencia = "UPDATE `tapa` SET `idTapa`=".$_POST['idTapa'].",`nombre`='".$_POST['nombre']."',`descripcion`='".$_POST['descripcion']."',`tipoTapa_idTipoTapa`=".$_POST['tipoTapa']." WHERE idTapa=".$_POST['idTapa'];
						$mysqli->query($sentencia);
						echo "<h2>Se a modificado la tapa correctamente</h2>";
						header('Refresh: 3;carta.php');
					}else{
						//Eliminamos la foto que tenia anteriormente
						$sentencia = "SELECT foto.foto, tipotapa.nombre FROM foto INNER JOIN tapa ON tapa.idTapa=foto.tapa_idTapa INNER JOIN tipoTapa ON tipotapa.idTipoTapa=tapa.tipoTapa_idTipoTapa WHERE tapa.idTapa=".$_POST['idTapa'];
						$resultado = $mysqli->query($sentencia)->fetch_array();
						$fichero = "css/img/tapas/".$resultado[1]."/".$resultado[0];
						unlink($fichero);
						$mysqli->query("DELETE FROM `foto` WHERE foto='".$resultado[0]."'");
						//Añade las nueva foto
						$tipoTapa = $mysqli->query("SELECT nombre FROM tipotapa WHERE idTipoTapa=".$_POST['tipoTapa'])->fetch_array()[0];
						$uploaddir = "css/img/tapas/".$tipoTapa."/";
						$uploadfile = $uploaddir . basename($_FILES['foto']['name']);
						if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
							//Agrega la entrada en al base de datos de la foto de la tapa
							$sentencia="INSERT INTO `foto`(`idFoto`, `foto`, `album_idAlbum`, `tapa_idtapa`) VALUES (NULL,'".$_FILES['foto']['name']."',1,".$_POST['idTapa'].")";
							$mysqli->query($sentencia);
						} else {
							$sentencia="DELETE FROM `tapa` WHERE idTapa=".$idTapa."";
							$mysqli->query($sentencia);
						}
						//Modificamos los datos
						$sentencia = "UPDATE `tapa` SET `idTapa`=".$_POST['idTapa'].",`nombre`='".$_POST['nombre']."',`descripcion`='".$_POST['descripcion']."',`tipoTapa_idTipoTapa`=".$_POST['tipoTapa']." WHERE idTapa=".$_POST['idTapa'];
						$mysqli->query($sentencia);
						echo "<h2>Se a modificado la tapa correctamente</h2>";
						header('Refresh: 2;carta.php');
					}
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>
