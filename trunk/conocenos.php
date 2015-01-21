<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	
	<script type="text/javascript" src="engine0/jquery.js"></script>
	<script type="text/javascript" src="scripts/popup.js"></script>	
	<script type="text/javascript" src="http://www.google.com/jsapi?key=AIzaSyAy_t8Qh1kpzv9-49L-Ur_VHXcLX9hklt0"></script>
	<script type="text/javascript">
  		google.load('maps', '2', {callback:simple2});var map;
		function simple2(){	
			if (GBrowserIsCompatible()) { 
				
			var map = new GMap2(document.getElementById("map2"));
			
			map.addControl(new GLargeMapControl());
			map.addControl(new GMapTypeControl());	  
			map.setCenter(new GLatLng(36.986714,-2.619436),15); 
			map.addOverlay(marker);
			 
			}
		}
		window.onload=function(){
			simple2();
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
			<div class="evento">
				<br />
				
				<center>
					<h3>Aqui esta nuestro local.</h3>

					<div id="map2" style="width:500px;height:240px;border:10px solid green;" ></div>
					
				</center>
				
				<form action="enviarCorreoReserva.php" class="formularios" name="formulariocontacto" method="post" enctype="multipart/form-data">
					<center>
					<h3>Haz tu reserva y nostros contactaremos contigo.</h3>
					<div><label>Nombre</label><input type="text" name="nombre" id="nombre" /></div>
					<div><br/><label>Telefono</label><input type="text" name="telefono" id="telefono" /></div>
					<div><br/><label>Correo Electronico</label><input type="text" name="correo" id="correo" /></div>
					<div><br/><label>Asunto</label><textarea type="text" name="asunto" id="asunto" cols="80"></textarea></div>
					<div><label>Mensaje</br></label><textarea name="mensaje" id="mensaje" rows="10" cols="80"></textarea></div>
					<div><button type="submit" value="Enviar" >Enviar</button></div>
					<div><button type="reset" value="reset">Limpiar</button></div>
					</center>
				</form>
				
				<br/>
			</div>
		</div>
		<div id="pie">
			<div id="enlaces">
				<h3>Sitios Relacionados</h3>
				<hr/>
				<a href="http://www.museodeterque.com/" title="Museo de Terque">Museo de Terque</a>
			</div>
			<div id="contacta">
				<h3>Contacta con nosotros</h3>
				<hr/>
				<a>Telf: 622-112-446 </a>
				<br></br>
				<a>Direccion: Plaza del la Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
		</div>
	</div>
	
</body>
</html>