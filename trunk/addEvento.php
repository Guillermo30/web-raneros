<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!--  HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">

	<link rel="stylesheet" type="text/css" href="engine0/style.css"></link>

	<script type="text/javascript" href="engine0/jquery.js"></script>
	
	<link rel"icon" type"image/png" src="css/img/favicon.png"></link>

	<!-- HEAD section -->
	
	<script type="text/javascript" src="scripts/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="scripts/scrollJQuery.js"></script>
	<script language="JavaScript">
		
		function fecha(){
			fecha = new Date()
			mes = fecha.getMonth()
			diaMes = fecha.getDate()
			diaSemana = fecha.getDay()
			anio = fecha.getFullYear()
			dias = new Array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sábado')
			meses = new Array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre')
			document.write('<span id="fecha">')
			document.write (dias[diaSemana] + ", " + diaMes + " de " + meses[mes] + " de " + anio)
			document.write ('</span>')
		}

		function hora(){
			var fecha = new Date()
			var hora = fecha.getHours()
			var minuto = fecha.getMinutes()
			var segundo = fecha.getSeconds()
			if (hora < 10) {hora = "0" + hora}
			if (minuto < 10) {minuto = "0" + minuto}
			if (segundo < 10) {segundo = "0" + segundo}
			var horita = hora + ":" + minuto + ":" + segundo
			document.getElementById('hora').firstChild.nodeValue = horita
			tiempo = setTimeout('hora()',1000)
		}
		
		function inicio(){
			document.write(' <span id="hora">')
			document.write ('000000</span>')
			hora()
		}
	</script>
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
			?>
			<div class="evento">
				<form action="confAddEvento.php" class="formularios" method="post" enctype="multipart/form-data">
					<div><label>Nombre</br></label><input type="text" name="nombre" id="nombre"></div>
					<div><label>Descripcion</br></label><textarea name="descripcion" rows="5" cols="5"></textarea></div>
					<div><label>Fecha de Evento</br></label><input type="date" name="fecha" min="2015-01-01" max="2020-12-31"></div>
					<div><label>Hora evento</br></label><input type="time" name="hora"></div>
					<div><label>Fecha Actual</br></label><script>fecha();</script></div>
					<div><label>Imagen</a></br><input type="file" name="foto"></div>
					<div><input type="submit" value="Agregar Evento"></input><input type="reset" value="Reset"></div>

				</form>
			</div>
		</div>
		
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>