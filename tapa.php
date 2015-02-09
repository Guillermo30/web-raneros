<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title> <!-- Start WOWSlider.com HEAD section -->
	<!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<link rel="stylesheet"
		href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
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
		<div id="contenedorCuerpo">

			<div class="evento">
				<!--  <center><h2><a href="javascript:history.back();" ></>Volver atras</a></h2></center>-->
				<?php
				// session_start();
				// include('conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
				echo "<center>";
				
				$sql = new conexionSQL (); // instanciamos objeto de la clase creada en el fichero "conexionSQL"
				$imagen = mysqli_fetch_array ( $sql->selectSQL ( "SELECT foto FROM foto WHERE tapa_idtapa='" . $_GET ['id'] . "'" ), MYSQLI_NUM );
				$idcategoria = mysqli_fetch_array ( $sql->selectSQL ( "SELECT tipoTapa_idTipoTapa FROM tapa WHERE idTapa='" . $_GET ['id'] . "'" ), MYSQLI_NUM );
				$categoria = mysqli_fetch_array ( $sql->selectSQL ( "SELECT nombre FROM tipotapa WHERE idTipoTapa='" . $idcategoria [0] . "'" ), MYSQLI_NUM );
				$sentencia = "SELECT * FROM tapa WHERE idTapa='" . $_GET ['id'] . "'";
				$consulta = $sql->selectSQL ( $sentencia );
				$row = mysqli_fetch_array ( $consulta, MYSQLI_ASSOC );
				$_SESSION ['tipoTapa'] = $idcategoria [0];
				$_SESSION ['idTapa'] = $_GET ["id"];
				// usuario
				echo "<h2>" . $row ['nombre'] . "</h2><br>";
				// echo "<img src='css/img/tapas/".$categoria[0]."/".$imagen[0]."' alt='".$row['nombre']."' height='100' width='100'>";
				echo '<img onclick="javascript:this.width=450;this.height=338" ondblclick="javascript:this.width=100;this.height=80" src="css/img/tapas/' . $categoria [0] . '/' . $imagen [0] . '" width="100"/>';
				echo "<p style:center>" . $row ['descripcion'] . "</p>";
				
				// Usuario Registrado
				echo "<center><h3>Comentarios</h3></center><hr/>";
				?>
			</div>
			<?php
			// Muestra los comentarios registratos.
		
			include ('php/constantesConexion.php');
			$mysqli = new mysqli ( $host, $usuario, $passwd, $bd );
			$sentencia = "SELECT * FROM `cometario` WHERE tapa_idTapa=" . $_GET ['id'];
			$consulta = $mysqli->query ( $sentencia );
			while ( $row = mysqli_fetch_array ( $consulta, MYSQLI_ASSOC ) ) {
				echo "<div class='evento'>";
				$usarioComent="";
				// //
				$sentencia1 = "SELECT * FROM `usuario` WHERE idusuarios=" .$row['usuario_idusuarios'];
			 
				$consulta1 = $mysqli->query ( $sentencia1 );
				while ( $row1 = mysqli_fetch_array ( $consulta1, MYSQLI_ASSOC ) ) {
					$usarioComent=$row1['nombre'];
				}
				// /
				
				echo "<p><b>" . $usarioComent . "</b>&nbsp;dijo:</p>";
				echo "<p>" . $row ['comentario'] . "</p>";
				echo "<hr/>";
				echo "</div>";
			}
			// Crear nuevos comentarios
			if (isset ( $_SESSION ['id'] )) {
				echo "<div class='evento'>";
				echo "<form action='php/addComentario.php' class='formularios' method='post'>";
				echo "<div><input type='hidden' name='idTapa' id='idTapa' value=" . $_GET ['id'] . "></input></div>";
				echo "<div><input type='hidden' name='idUsuario' id='tipoTapa' value=" . $_SESSION ['id'] . "></input></div>";
				echo "<div><h3>Agrege un comentario a esta tapa</h3><br /><textarea name='comentario' rows='5' cols='5'></textarea></div>";
				echo "<div><input type='submit' value='Agregar comentario'></input><input type='reset' value='reset'></input></div>";
				echo "</form>";
				echo "</div>";
			}
			
			echo "</center>";
			?>
		</div>
		<?php include('php/pie.php');?>
	</div>

</body>
</html>