<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section --></head>
	
	<script type="text/javascript" src="scripts/popup.js"></script>	

<body>
	<div id="contenido">
		<div id="cabecera">
			<img src="css/img/BannerVerde.jpg" id="fondoCabecera">
			<div id="titleHeader">
				<img src="css/img/icono-rana.png" id="logo" width="90px" height="90px">
				<h1>Los Raneros</h1>
				<h3>Cafe Bar</h3>
			</div>
			<div id="redesSociales">
				<div id="redesTitle">
					<h3>Social Links</h3>
				</div>
				<div id="redesLinks">
					<img src="css/img/iconos/facebook.png" class="logoSocial">
					<img src="css/img/iconos/twitter.png" class="logoSocial">
				</div>
			</div>
		</div>
		<div id="menuID" class="menu">
			<?php 
				include ('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
			?>
		</div>
		<div id="contenedorCuerpo">
			<div class="evento">
				<?php
					include('php/constantesConexion.php');
					//include('php/conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
					
					//$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
					//Al intentar hacer la conexion con el fichero conexionSQL me daba algun tipo de fallo
					//que no he podio resolver nose por que
					$sql = new mysqli($host, $usuario,$passwd,$bd);
					$sentencia="SELECT * FROM tipotapa";
					$consulta=$sql->query($sentencia);
					while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
						echo "<h3>".$row['nombre']."</h3>";
						echo "<hr />";
						$sql2=new mysqli($host, $usuario,$passwd,$bd);
						$sentencia2="SELECT * FROM tapa WHERE tipoTapa_idTipoTapa='".$row['idTipoTapa']."'";
						$consulta2 = $sql2->query($sentencia2);
						while($row2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)){
							//echo "<a>".$row2['nombre']."</a>";
							echo "<a href='php/tapa.php?id=".$row2['idTapa']."' pmcñocl='javascript:popup(this.href); return false;'>";
							echo $row2['nombre'];
							echo "</a>";
						}
					}
				?>
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
				<a>Telf: XXX XXX XXX</a>
				<br></br>
				<a>Direccion: XXXXXXXXXXX</a>
			</div>
		</div>
	</div>
</body>
</html>