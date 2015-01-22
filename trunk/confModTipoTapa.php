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
					//Modificamos los datos
					$sentencia = "UPDATE `tipotapa` SET `idTipoTapa`=".$_POST['idTipoTapa'].",`nombre`='".$_POST['nombre']."' WHERE idTIpoTapa=".$_POST['idTipoTapa'];
					$mysqli->query($sentencia);
					echo "<h2>Se a modificado la tapa correctamente</h2>";
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>
