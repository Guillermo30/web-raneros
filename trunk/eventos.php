<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<!-- para los iconos de las redes sociales -->
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css'>

<title>Los Raneros</title>

<script type="text/javascript" src="scripts/jquery-2.1.1.js"></script>
<script type="text/javascript" src="scripts/scrollJQuery.js"></script>
	

</head>

<body>
	<div id="contenido">
		<div id="cabecera">
			<img src="css/img/BannerVerde.jpg" id="fondoCabecera">
			<div id="titleHeader">
				<img src="css/img/rana-coloreada.gif" id="logo" width="140px" height="90px">
				
				<h1>Los Raneros</h1>
				<h3>Cafe Bar</h3>
				
			</div>
			<div id="redesSociales">
				<center>
					<a href="http://twitter.com/minimalmonkey" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
					<a href="http://facebook.com" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
					<a href="http://plus.google.com" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
				</center>	
			</div>
		</div>
		<div id="menuID" class="menu">
			<?php 
				include ('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
			?>
		</div>
		<br></br>
		<div id="contenedorCuerpo">	<!-- BODY section --> <!-- add to the <body> of your page -->
		
		<div id="wowslider-container0">
		<div class="evento">
				<?php
					include('php/constantesConexion.php');
					//include('php/conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
					
					$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
					//Al intentar hacer la conexion con el fichero conexionSQL me daba algun tipo de fallo
					//que no he podio resolver nose por que
					//$sql = new mysqli($host, $usuario,$passwd,$bd);
					$sentencia="SELECT * FROM evento";
					$consulta=$sql->selectSQL($sentencia);
					//$consulta=$sql->query($sentencia);
					while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
						echo "<h3>".$row['nombre']."</h3>";
						echo "<hr />";
						//$sql2=new mysqli($host, $usuario,$passwd,$bd);
						$sql2=new conexionSQL();
						$sentencia2="SELECT * FROM tapa WHERE tipoTapa_idTipoTapa='".$row['idTipoTapa']."'";
						//$consulta2 = $sql2->query($sentencia2);
						$consulta2=$sql2->selectSQL($sentencia2);
						while($row2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)){
							//echo "<a>".$row2['nombre']."</a>";
							echo "<a href='php/tapa.php?id=".$row2['idTapa']."' onClick='javascript:popup(this.href); return false;'>";
							echo $row2['nombre'];
							echo "</a>";
						}
					}
				?>
		
		
		<br></br>
		<br></br>
		<br></br>
		
		
		
		

		<!-- BODY section -->
		<div class="ws_shadow"></div>
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