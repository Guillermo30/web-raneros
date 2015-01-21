<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<script type="text/javascript" src="scripts/popup.js"></script>	
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
				<?php
					include('php/constantesConexion.php');
					//include('php/conexionSQL.php'); //Incluimos el fichero donde est� la clase conexionSQL
					
					$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
					//Al intentar hacer la conexion con el fichero conexionSQL me daba algun tipo de fallo
					//que no he podio resolver nose por que  
					/********************** JUAN ESTE FALLO TE DA PQ CUANDO HACEMOS UN INCLUDE 
					//DE MENU.PHP A SU VEZ ESTAMOS INCLUYENDO TB CONEXIONSQL.PHP DENTRO DE MENU.PHP
					// Y POR TANTO ESTARIAMOS INSTANCIANDO 2 VECES EN LA MISMA P�GINA QUE ES EL ERROR Q T DA. OS LO COMENTO POR SI OS DA ALG�N OTRO PROBLEMA PARECIDO
					// EN OTRA P�GINA, Q OS FIJEIS Q EN LAS P�GINAS DND HACEMOS INCLUDE('PHP/MENU.PHP') NO HACE FALTA 
					// HACER OTRO INCLUDE PARA CONEXIONSQL.PHP, PUESTO Q YA SE ESTA HACIENDO EN MENU.PHP
					// EN LAS QUE NO LLEVEN MENU SI HABR� Q HACERLO PARA PODER USAR CONEXIONSQL.PHP 
					//*********************************************************************************************
					 */
					//$sql = new mysqli($host, $usuario,$passwd,$bd);
					$sentencia="SELECT * FROM tipotapa";
					$consulta=$sql->selectSQL($sentencia);
					//$consulta=$sql->query($sentencia);
					if(isset($_SESSION['esRoot']) && $_SESSION['esRoot'])
						echo "<a href='addTipoTapa.php'>Agregar un nuevo tipo de tapa</a>";
					//contador para las columnas
					$contadorColumnas=1;
					while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
						//colocamos en la columna de la derecha o izquierda
						if(($contadorColumnas%2)==1){
							echo "<div class='columLeft'>";
						}else{
							echo "<div class='columRigth'>";
						}
						if(isset($_SESSION['esRoot'])){
							if($_SESSION['esRoot']==1)
								echo "<h3>".$row['nombre']." <a href='addTapa.php?tipoTapa=".$row['idTipoTapa']."'><img src='css/img/iconos/add.png' class='icon' alt='A�adir Tapa'> </a><a href='modificarTipoTapa.php?tipoTapa=".$row['idTipoTapa']."'><img src='css/img/iconos/edit.png' class='icon' alt='Modifiar Tipo de Tapa'> </a><a href='eliminarTipoTapa.php?tipoTapa=".$row['idTipoTapa']."'><img src='css/img/iconos/delete.png' class='icon' alt='Eliminar Tipo de Tapa'> </a></h3>";
							else
								echo "<h3>".$row['nombre']."</h3>";
						}else{
							echo "<h3>".$row['nombre']."</h3>";
						}
						echo "<hr />";
						$sql2=new conexionSQL();
						$sentencia2="SELECT * FROM tapa WHERE tipoTapa_idTipoTapa='".$row['idTipoTapa']."'";
						$consulta2=$sql2->selectSQL($sentencia2);
						while($row2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)){
							echo "<a href='php/tapa.php?id=".$row2['idTapa']."'>";
							echo $row2['nombre'];
							if(isset($_SESSION['esRoot'])){
								if($_SESSION['esRoot']==1)
									echo " <a href='modificarTapa.php?idTapa=".$row2['idTapa']."'><img src='css/img/iconos/edit.png' class='icon' alt='Modificar Tapa'> </a><a href='eliminarTapa.php?idTapa=".$row2['idTapa']."'><img src='css/img/iconos/delete.png' class='icon' alt='Eliminar Tapa'> </a></a>";
								else
									echo "</a>";
							}else{
								echo "</a>";
							}
							echo "<br />";
						}
						//incrementamos el contador columnas
						$contadorColumnas++;
						echo "</div>";
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