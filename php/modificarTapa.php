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
					session_start();
					include('conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
					
					$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
					//INCOMPLETO 05/01/2014 CONTINUO MÁS TARDE POR AQUÍ
					//****************************************************
					$sentencia="UPDATE tapa SET(nombre=".$_POST["nombre"].")";
					
				?>
			</div>
		</div>
	</div>
</body>
</html>