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
					include('php/funciones.php');
					//Comprueba si es root, en caso contrario devuelve al index
					if(isset($_SESSION['esRoot']) && $_SESSION['esRoot'] == 1){
					
					}else{
						header('Location: index.php');
					}
					include ('php/constantesConexion.php');
					$mysqli = new mysqli($host, $usuario, $passwd, $bd);
					//Comprobamos primero si tiene tapas asociadas
					$sentencia = "SELECT * FROM tapa WHERE tipoTapa_idTipoTapa=".$_GET['tipoTapa'];
					$tapasAsociadas = $mysqli->query($sentencia)->fetch_assoc();
					if(count($tapasAsociadas)>0){
						echo "<h1>Lo sentimos pero previamente debe eliminarse las tapas asociadas a dicho tipo de tapa</h1>";
					}else{
						//Obtenemos en nombre del tipo de tapa para poder borrar dicho directorio asociado
						$sentencia="SELECT nombre FROM tipotapa WHERE idTipoTapa=".$_GET['tipoTapa'];
						$sql=new conexionSQL();
						$resultado=$sql->selectSQL($sentencia);//guardamos nombre tipoTapa
						$nombreTipo=$resultado->fetch_assoc();//guardamos nombre tipoTapa
							
						
						$mysqli->query("DELETE FROM `tipotapa` WHERE idTipoTapa=".$_GET['tipoTapa']);
						$directorio=new Directorios(); //instanciamos objeto directorio
						$directorio->eliminarDir("css/img/tapas/".$nombreTipo['nombre']); //llamamos a la funcion eliminarDirectorio del objeto
						echo "<h1>Se ha eliminado correctamente dicho tipo de tapa</h1>";
						header('Refresh: 3;carta.php');
					}
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>
