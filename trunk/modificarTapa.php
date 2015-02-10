<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
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
					//Comienza por listar los datos de dicha tapa
					$sentencia = "SELECT * FROM tapa WHERE idTapa=".$_GET['idTapa'];
					$resultado = $mysqli->query($sentencia)->fetch_assoc();
					echo "<form action='confModTapa.php' class='formularios' method='post' enctype='multipart/form-data'>";
					echo "<input type='hidden' name='idTapa' value='".$_GET['idTapa']."'></input>";
					echo "<div><a>Nombre</a></br><input type='text' name='nombre' value='".$resultado['nombre']."'></input></div>";
					echo "<div><a>Descripcion</a></br><textarea name='descripcion' rows='5' cols='5'>".$resultado['descripcion']."</textarea></div>";
					//Listado de tipo de Tapa para mover una tapa de un tipo de tapa a otro
					$tipoTapa = $mysqli->query("SELECT tipotapa.nombre FROM tipotapa INNER JOIN tapa ON tipotapa.idTipoTapa = tapa.tipoTapa_idTipoTapa WHERE idTapa=".$_GET['idTapa'])->fetch_assoc()['nombre'];
					echo "<input type='hidden' name='antiTipoTapa' value='".$tipoTapa."'></input>";
					$tiposTapa = $mysqli->query("SELECT * FROM tipotapa");
					echo "<select name='tipoTapa'>";
					while($row=mysqli_fetch_array($tiposTapa, MYSQLI_ASSOC)){
						if(strcmp($tipoTapa, $row['nombre']) == 0)
							echo "<option value=".$row['idTipoTapa']." selected>".$row['nombre']."</option>";
						else
							echo "<option value=".$row['idTipoTapa'].">".$row['nombre']."</option>";
					}
					echo "</select>";
					echo "<div><a>Imagen</a></br><input type='file' name='foto'></input></div>";
					echo "<div><input type='submit' value='Modificar Tapa'></input><input type='reset' value='Reset'></input></div>";
					echo "</form>";
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>
