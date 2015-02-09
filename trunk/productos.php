<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Los Raneros</title> <!-- Start WOWSlider.com HEAD section -->
	<!-- add to the <head> of your page -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

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
				<br />
				<?php
				$sql = new conexionSQL ();
				$sentencia = "SELECT  * FROM producto";
				$consulta = $sql->selectSQL ( $sentencia );
				
				
				if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'])
					echo "<div class='agregar'><a href='addProducto.php'> Agregar un producto nuevo </a></div>";
				while ( $row = mysqli_fetch_array ( $consulta, MYSQLI_ASSOC ) ) {
					
					$sql2 = new conexionSQL ();
					$sentencia2 = "SELECT * FROM producto WHERE idProducto='" . $row['idProducto']. "'";
					$consulta2 = $sql2->selectSQL ( $sentencia2 );
					
					while ( $row2 = mysqli_fetch_array ( $consulta2, MYSQLI_ASSOC ) ) {
						
						//$file = $_FILES['imagen']['nombre'];
						
						echo "<div class='eventoCaja'>";
						//echo "<b>Foto:</b> " . $. "<br/>";
						echo "<b>Nombre del producto:</b> " . $row2 ['nombre'] . "<br/>";
						echo "<b>Precio:</b>" . $row2 ['precio'] . " Euros.<br/>";
						echo "<b>Descripci&oacute;n:</b> " . $row2 ['descripcion'] . "<br/>";
						
						if (isset ( $_SESSION ['esRoot'] ) && $_SESSION ['esRoot'] == 1) {
					
							echo " <a href='modificarProducto.php?idProducto=".$row2['idProducto']."&nombre=". $row2 ['nombre']."&descripcion=". $row2 ['descripcion']."&foto=". $row2 ['descripcion']."'><img src='css/img/iconos/edit.png' class='icon' alt='Modificar producto'> </a><a href='eliminarProducto.php?id="."&idProducto=".$row2['idProducto']."'><img src='css/img/iconos/delete.png' class='icon' alt='Eliminar Producto'> </a></a>";
							echo "</div>";
							echo "</a>";
					
						}else{
					
							echo "</div>";
							echo "</a>";
					 
				}
				
			}
			
		}
		?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>
