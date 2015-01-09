<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title>
<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section -->
	
</head>
		
<script type="text/javascript" src="D:\FRAN\GRADO INFORMATICA\TECNOLOGIAS WEB\PROYECTO_WEB\SVN WEB RANEROS\trunk\scripts\tapas.js"></script>

<body>
	<div id="contenido">
		<div id="contenedorCuerpo">
			<div class="evento">
				<?php 
					session_start();
					include('conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
					
					
					$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
					$imagen = mysqli_fetch_array($sql->selectSQL("SELECT foto FROM foto WHERE tapa_idtapa='".$_GET['id']."'"), MYSQLI_NUM);
					$idcategoria = mysqli_fetch_array($sql->selectSQL("SELECT tipoTapa_idTipoTapa FROM tapa WHERE idTapa='".$_GET['id']."'"), MYSQLI_NUM);
					$categoria = mysqli_fetch_array($sql->selectSQL("SELECT nombre FROM tipotapa WHERE idTipoTapa='".$idcategoria[0]."'"), MYSQLI_NUM);
					$sentencia="SELECT * FROM tapa WHERE idTapa='".$_GET['id']."'";
					$consulta=$sql->selectSQL($sentencia);
					$row=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
					//usuario
// 					echo "<h2>".$row['nombre']."</h2><br>";
// 					echo "<img src='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='Smiley face' height='100' width='100'>";
// 					echo "<p>".$row['descripcion']."</p>";
// 					if(isset($_SESSION['esRoot']))
					{
						if($_SESSION['esRoot']==1)
						{
							//echo "<div class='evento'>";
							echo "<form action='modificarTapa.php' class='formularios' name='formularioModificarTapa' method='post'>";
							echo "<input type='hiden' name='idTapa' id='idTapa' value='".$row['idTapa']."'/>";
							echo "<a>Nombre Tapa</a></br><input type='text' name='nombre' id='nombre' value='".$row['nombre']."'/>";
							echo "<img src='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='Smiley face' height='100' width='100'>";
							echo "</br><a>Seleccionar Tapa</a></br><input type='file' name='foto' id='foto' value='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' />";
							echo "</br><a>Descripcion</a></br><input type='text' name='descripcion' id='descripcion' value='".$row['descripcion']."' />";
							echo "</br></br><button type='submit' value='Enviar'>Modificar Tapa</button>";
							echo "</br></br><div><button type='button' value='Enviar' onclick='eliminarTapa(".$row['idTapa'].")'>Elminar Tapa</button></div>";
							//echo "</br></br><input type='submit' value='Modificar Tapa' />";
							//echo "</br></br><input type='button' value='Eliminar Tapa' onclick='eliminarTapa(".$row['idTapa'].")' />";
							echo "</form>";
							
							//echo "</div>";
						} else {
							echo "<h2>".$row['nombre']."</h2><br>";
							echo "<img src='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='Smiley face' height='100' width='100'>";
							echo "<p>".$row['descripcion']."</p>";
						}
					} 
				?>
			</div>
		</div>
	</div>
	
</body>
</html>