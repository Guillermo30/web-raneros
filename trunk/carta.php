<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<script src="scripts/lightgallery/lightgallery.min.js" type="text/javascript"></script>
<link href="scripts/lightgallery/skins/default/style.css" type="text/css" media="screen" rel="stylesheet" />

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
<script type="text/javascript">
lightgallery.init();
</script>
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
					//include('php/conexionSQL.php'); //Incluimos el fichero donde estï¿½ la clase conexionSQL
					
					$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
					//Al intentar hacer la conexion con el fichero conexionSQL me daba algun tipo de fallo
					//que no he podio resolver nose por que  
					/********************** JUAN ESTE FALLO TE DA PQ CUANDO HACEMOS UN INCLUDE 
					//DE MENU.PHP A SU VEZ ESTAMOS INCLUYENDO TB CONEXIONSQL.PHP DENTRO DE MENU.PHP
					// Y POR TANTO ESTARIAMOS INSTANCIANDO 2 VECES EN LA MISMA Pï¿½GINA QUE ES EL ERROR Q T DA. OS LO COMENTO POR SI OS DA ALGï¿½N OTRO PROBLEMA PARECIDO
					// EN OTRA Pï¿½GINA, Q OS FIJEIS Q EN LAS Pï¿½GINAS DND HACEMOS INCLUDE('PHP/MENU.PHP') NO HACE FALTA 
					// HACER OTRO INCLUDE PARA CONEXIONSQL.PHP, PUESTO Q YA SE ESTA HACIENDO EN MENU.PHP
					// EN LAS QUE NO LLEVEN MENU SI HABRï¿½ Q HACERLO PARA PODER USAR CONEXIONSQL.PHP 
					//*********************************************************************************************
					 */
					//$sql = new mysqli($host, $usuario,$passwd,$bd);
					$sentencia="SELECT * FROM tipotapa";
					$consulta=$sql->selectSQL($sentencia);
					//$consulta=$sql->query($sentencia);
					if(isset($_SESSION['esRoot']) && $_SESSION['esRoot'])
						echo "<div class='agregar'><a href='addTipoTapa.php'>Agregar un nuevo tipo de tapa</a></div>";
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
								echo "<h3>".$row['nombre']." <a href='addTapa.php?tipoTapa=".$row['idTipoTapa']."'><img src='css/img/iconos/add.png' class='icon' alt='Aï¿½adir Tapa'> </a><a href='modificarTipoTapa.php?tipoTapa=".$row['idTipoTapa']."'><img src='css/img/iconos/edit.png' class='icon' alt='Modifiar Tipo de Tapa'> </a><a href='eliminarTipoTapa.php?tipoTapa=".$row['idTipoTapa']."'><img src='css/img/iconos/delete.png' class='icon' alt='Eliminar Tipo de Tapa'> </a></h3>";
							else
								echo "<h3>".$row['nombre']."</h3>";
						}else{
							echo "<h3>".$row['nombre']."</h3>";
						}
						echo "<hr />";
						$sql2=new conexionSQL();
						$sentencia2="SELECT * FROM tapa WHERE tipoTapa_idTipoTapa='".$row['idTipoTapa']."'";
						$consulta2=$sql2->selectSQL($sentencia2);
						$ind="Hola";
						while($row2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)){

						 
							$sentencia3="SELECT * From foto WHERE tapa_idtapa='".$row2['idTapa']."'";
							$sql3=new conexionSQL();
							$consulta3=$sql3->selectSQL($sentencia3);
							$row3=mysqli_fetch_array($consulta3, MYSQLI_ASSOC);
							 
							echo"<div>"; 
							 
							//echo"<a href='php/tapa.php?id='".$row2['idTapa'] ."'>";
							
							//<!-- MEDIANTE IMAGEN -->
							//echo "<a href='' rel="lightbox" title="TITULO DE LA IMAGEN"><img src="URL DE LA IMAGEN PEQUEÑA"/></a>"
							//<!-- MEDIANTE URL -->
							//echo "<a href='css/img/tapas/".$row['nombre']."/".$row3['foto']."' rel='lightbox' title='Tapa'><img src='css/img/tapas/".$row['nombre']."/".$row3['foto']."'/></a>"
							
							?>
							<a href="tapa.php?id=<?php echo $row2['idTapa'] ?>">
							<?php 
							echo $row2['nombre'];
							echo"</a>";
							echo "</div>";
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
		 <?php include('php/pie.php');?>
	</div>
</body>
</html>