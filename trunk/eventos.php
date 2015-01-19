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
				<img src="css/img/rana-coloreada.gif" id="logo" width="140px" height="90px">
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
		<br></br>
		<div id="contenedorCuerpo">
			<div class="evento">
				<br />
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
					if(isset($_SESSION['esRoot']) && $_SESSION['esRoot'])
						echo "<a href='addEvento.php'><label>Agregar un evento nuevo</label></a>";
					while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
						if(isset($_SESSION['esRoot'])){
							if($_SESSION['esRoot']==1)
								echo "<h3>".$row['nombre']." <a href='addTapa.php?evento=".$row['idEvento']."'><img src='css/img/iconos/add.png' class='icon' alt='Añadir Evento'> </a><a href='modificarEvento.php?evento=".$row['idEvento']."'><img src='css/img/iconos/edit.png' class='icon' alt='Modifiar Evento'> </a><a href='eliminarEvento.php?evento=".$row['idEvento']."'><img src='css/img/iconos/delete.png' class='icon' alt='Eliminar Evento'> </a></h3>";
							else
								echo "<h3>".$row['nombre']."</h3>";
						}else{
							echo "<h3>".$row['nombre']."</h3>";
						}
						echo "<hr />";
						//$sql2=new mysqli($host, $usuario,$passwd,$bd);
						$sql2=new conexionSQL();
						$sentencia2="SELECT * FROM evento WHERE idEvento='".$row['idEvento']."'";
						//$consulta2 = $sql2->query($sentencia2);
						$consulta2=$sql2->selectSQL($sentencia2);
						while($row2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)){
							//echo "<a>".$row2['nombre']."</a>";
							//echo "<a href='php/tapa.php?id=".$row2['idTapa']."' onClick='javascript:popup(this.href); return false;'>";
							echo "<a href='php/evento.php?id=".$row2['idEvento']."'>";
							echo $row2['nombre'];
							if(isset($_SESSION['esRoot'])){
								if($_SESSION['esRoot']==1)
									echo " <a href='modificarEvento.php?idTapa=".$row2['idEvento']."'><img src='css/img/iconos/edit.png' class='icon' alt='Modificar Evento'> </a><a href='eliminarEvento.php?idTapa=".$row2['idEvento']."'><img src='css/img/iconos/delete.png' class='icon' alt='Eliminar Evento'> </a></a>";
								else
									echo "</a>";
							}else{
								echo "</a>";
							}
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
				<a>Telf: 622-112-446 </a>
				<br></br>
				<a>Direccion: Plaza del la Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
		</div>
	</div>
</body>
</html>