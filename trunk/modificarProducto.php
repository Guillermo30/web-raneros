<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!--  HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css"></link>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<script type="text/javascript" href="engine0/jquery.js"></script>
	
	<link rel"icon" type"image/png" src="css/img/favicon.png"></link>

	<!-- HEAD section -->
	
	<script type="text/javascript" src="scripts/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="scripts/scrollJQuery.js"></script>
	
</head>

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
			<?php 
				//Comprueba si es root
				if(isset($_SESSION['esRoot']) && $_SESSION['esRoot'] == 1){
						
				}else{
					header('Location: index.php');
				}
				
				//$sql = new conexionSQL ();
				//$sentencia = "SELECT * FROM producto WHERE idProducto=".$_GET['idProducto'];
				//$sql->insertarSQL ( $sentencia );
				//echo $_GET['idProducto'];
			?>
			<div class="evento">
				<form action="confModificarProducto.php" class="formularios" method="post" enctype="multipart/form-data">
					<div><input type="hidden" name="idProducto" id="idProducto" value="<?php echo $_GET['idProducto']?>"></input></div>
					<div><label>Nombre</br></label><input type="text" name="nombre" id="nombre" value="<?php echo $_GET ['nombre'] ?>"></div>
					<div><label>Descripcion</br></label><textarea name="descripcion" rows="5" cols="5" ><?php echo $_GET ['descripcion'] ?></textarea></div>
					<div><label>Precio</br></label><input type="number" step="0.01" name="precio" ></div>
					<div><label>Imagen</a></br><input type="file" name="foto"></div>
					<div><input type="submit" value="Modificar Producto"></input> &nbsp;<input type="reset" value="Reset"></div>

				</form>
			</div>
		</div>
		
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>