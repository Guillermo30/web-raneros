<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title> <!-- Start WOWSlider.com HEAD section -->
	<!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
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
		<br></br>
		<div id="contenedorCuerpo">
			<div class="evento">
				<?php
				$fechaEvento=$_POST['fecha'];
				// Comprueba si es root, en caso contrario devuelve al index
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
				} else {
					header ( 'Location: index.php' );
				}
				
				if (! isset ( $_POST ['nombre'] ))
					$_POST ['nombre'] = "";
				if (! isset ( $_POST ['descripcion'] ))
					$_POST ['descripcion'] = "";
				if (! isset ( $_POST ['date'] ))
					$_POST ['fecha'] = "";
				if (! isset ( $_POST ['hora'] ))
					$_POST ['hora'] = "";
				
				$nombre = $_POST ['nombre']; // Nombre
				$descripcion = $_POST ['descripcion']; // Cuerpo del mensaje
				$fecha = $_POST ['fecha']; // Fecha de la cita
				$hora = $_POST ['hora']; // Hora de la cita
				                         // Concatenar fecha-hora
				$fechaHora = $_POST ['fecha'];
				$fechaHora .= " ";
				$fechaHora .= $_POST ['hora'];
				$foto=$_FILES['foto']['tmp_name'];
				
				$sql = new conexionSQL ();
				// Comienza a insertar
				// sentecias de insercion
				
				$sentencia = "UPDATE  evento  SET nombre='{$nombre}', descripcion='{$descripcion}',fecha='{$fechaEvento}'";
				 
				// echo $sentencia;
				if (! $sql->insertarSQL ( $sentencia )) {
					echo $sql->mysqli->error;
					echo "</br>Ha ocurrido un error al introducir el evento, int&eacutentelo de nuevo";
					header ( "Refresh: 3;URL=" . $_SERVER ['HTTP_REFERER'] );
				
				} else {
					echo "Evento agregado correctamente";
					// header ( "Refresh: 2;URL=eventos.php" );
					header ( "Location: eventos.php" );
				}
				
				?>
			</div>
		</div>
		<div id="pie">
			<div id="enlaces">
				<h3>Sitios Relacionados</h3>
				<hr />
				<a href="http://www.museodeterque.com/" title="Museo de Terque">Museo
					de Terque</a>
			</div>
			<div id="contacta">
				<h3>Contacta con nosotros</h3>
				<hr />
				<a>Telf: 622-112-446 </a> <br></br> <a>Direccion: Plaza del la
					Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
		</div>
	</div>
</body>
</html>
