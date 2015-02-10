<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title> <!-- Start WOWSlider.com HEAD section -->
	<!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>
	<link rel="stylesheet"
		href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
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
				
				// Comprueba si es root, en caso contrario devuelve al index
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
				} else {
					header ( 'Location: index.php' );
				}
				
				if (! isset ( $_POST ['nombre'] ))
					$_POST ['nombre'] = "";
				if (! isset ( $_POST ['descripcion'] ))
					$_POST ['descripcion'] = "";
				if (! isset ( $_POST ['precio'] ))
					$_POST ['precio'] = "";
				
				$nombre = $_POST ['nombre']; // Nombre
				$descripcion = $_POST ['descripcion']; // Cuerpo del mensaje
				$precio = $_POST ['precio'];
				$foto = $_FILES ['foto'] ['tmp_name'];
				$filename = $foto;
				$photoName = $_FILES ['foto'] ['name'];
				
				
				$sql = new conexionSQL ();
				
				$uploaddir = "css/img/producto/";
				$uploadfile = $uploaddir . basename ( $_FILES ['foto'] ['name'] );
				move_uploaded_file ($foto, $uploadfile);
				$sentencia = "INSERT INTO producto (descripcion,imagen,precio,nombre)
					VALUES ('{$descripcion}','{$photoName}','{$precio}','{$nombre}')";
				
				if ( !$sql->insertarSQL ( $sentencia )) {
					echo $sql->mysqli->error;
					echo "</br>Ha ocurrido un error al introducir el producto, int&eacutentelo de nuevo";
					
				} else {
					// Enviamos correo a todos usuarios que lo permitieron
					$sentencia3 = "SELECT * FROM usuario WHERE aceptarCorreo=1";
					$consulta3 = $sql->selectSQL ( $sentencia3 );
					$correo = "cafebarlosraneros@gmail.com";
					$asunto = '[PRODUCTO BAR LOS RANEROS],' . $nombre;
					$cuerpoEmail = "
						
						";
					$headers = 'From: ' . $correo . "\r\n" . 'Reply-To: ' . $correo . "\r\n" . 'X-Mailer: PHP/' . phpversion ();
					while ( $row3 = mysqli_fetch_array ( $consulta3, MYSQLI_ASSOC ) ) {
						if (mail ( $row3 ['email'], $asunto, $cuerpoEmail, $headers )) {
							
							
						
						} else {
							echo ErrorException;
						}
					}
					echo "Producto agregado correctamente";
					header ( "Refresh: 3;URL=productos.php" );
				}
				
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>
