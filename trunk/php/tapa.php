<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title>

	<script type="text/javascript" src="scripts/validacion.js"></script>
</head>
		

<body>
	<div id="contenido">
		<div id="contenedorCuerpo">
			<div class="evento">
				<?php 
					include('conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
					
					$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
					$imagen = mysqli_fetch_array($sql->selectSQL("SELECT foto FROM foto WHERE tapa_idtapa='".$_GET['id']."'"), MYSQLI_NUM);
					$idcategoria = mysqli_fetch_array($sql->selectSQL("SELECT tipoTapa_idTipoTapa FROM tapa WHERE idTapa='".$_GET['id']."'"), MYSQLI_NUM);
					$categoria = mysqli_fetch_array($sql->selectSQL("SELECT nombre FROM tipotapa WHERE idTipoTapa='".$idcategoria[0]."'"), MYSQLI_NUM);
					$sentencia="SELECT * FROM tapa WHERE idTapa='".$_GET['id']."'";
					$consulta=$sql->selectSQL($sentencia);
					$row=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
					//usuario
					echo "<h2>".$row['nombre']."</h2><br>";
					echo "<img src='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='Smiley face' height='100' width='100'>";
					echo "<p>".$row['descripcion']."</p>";
					if(isset($_SESSION['esRoot']))
					{
						if($_SESSION['esRoot'])
						{
							echo "<form action='modificarTapa.php' name='modificarTapa' method='post'>";
							echo "<a>Nombre Tapa</a></br><input type='text' name='nombre' id='nombre' value='".$row['nombre']." />";
							echo "<a>Nombre Tapa</a></br><input type='file' name='foto' id='foto' value='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' />";
							echo "<a>Descripcion</a></br><input type='text' name='descripcion' id='descripcion' value='".$row['descripcion']." />";
							echo "<button type='button' value='submit'>Modificar Tapa</button>";
							echo "<button type='button' onclick='eliminarTapa(".$row['id'].")'>Elminar Tapa</button>";
							echo "</form>";
						} else {
							echo "<h2>".$row['nombre']."</h2><br>";
							echo "<img src='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='Smiley face' height='100' width='100'>";
							echo "<p>".$row['descripcion']."</p>";
						}
					} else {
						echo "<h2>".$row['nombre']."</h2><br>";
						echo "<img src='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='Smiley face' height='100' width='100'>";
						echo "<p>".$row['descripcion']."</p>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>