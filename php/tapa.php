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
<script type="text/javascript" src="scripts/popup.js"></script>			
<script type="text/javascript" src="D:\FRAN\GRADO INFORMATICA\TECNOLOGIAS WEB\PROYECTO_WEB\SVN WEB RANEROS\trunk\scripts\tapas.js"></script>

<body>
	<div id="contenido">
		 
		<div id="contenedorCuerpo">
		
			<div class="evento">
			<center><h2><a href="javascript:history.back();" ></>Volver atras</a></h2></center>
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
					$_SESSION['tipoTapa']=$idcategoria[0];
					$_SESSION['idTapa']=$_GET["id"];
					//usuario
					echo "<h2>".$row['nombre']."</h2><br>";
					echo "<img src='../css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='".$row['nombre']."' height='100' width='100'>";
					echo "<p>".$row['descripcion']."</p>";
					//Usuario Registrado
				?>
			</div>
			<?php
				//Muestra los comentarios registratos.
				include ('constantesConexion.php');
				$mysqli=new mysqli($host, $usuario,$passwd,$bd);
				$sentencia = "SELECT * FROM `cometario` WHERE tapa_idTapa=".$_GET['id'];
				$consulta=$mysqli->query($sentencia);
				while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
					echo "<div class='evento'>";
						$sentencia = "SELECT * FROM usuario WHERE idusuarios=".$row['usuario_idusuarios'];
						$consulta=$sql->selectSQL($sentencia);
						$usuario=mysqli_fetch_array($consulta, MYSQLI_NUM)[1];
						echo "<h3>".$usuario."</h3><br />";
						echo "<p>".$row['comentario']."</p>";
					echo "</div>";
				}
				//Crear nuevos comentarios
				if(isset($_SESSION['id']))
				{
					echo "<div class='evento'>";
						echo "<form action='addComentario.php' class='formularios' method='post'>";
							echo "<div><input type='hidden' name='idTapa' id='idTapa' value=".$_GET['id']."></input></div>";
							echo "<div><input type='hidden' name='idUsuario' id='tipoTapa' value=".$_SESSION['id']."></input></div>";
							echo "<div><h3>Agrege un comentario a esta tapa</h3><br /><textarea name='comentario' rows='5' cols='5'></textarea></div>";
							echo "<div><input type='submit' value='Agregar comentario'></input><input type='reset' value='reset'></input></div>";
						echo "</form>";
					echo "</div>";	
				} 
			?>
		</div>
	</div>
	
</body>
</html>