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
					
					//Modificar la tapa
					
					$sentencia="UPDATE tapa SET nombre='".$_POST['nombre']."',descripcion='".$_POST['descripcion']."',tipoTapa_idTipoTapa='".$_SESSION['tipoTapa']."' WHERE idTapa='".$_SESSION['idTapa']."'";
					if($sql->updateSQL($sentencia)){
						if(!empty($_FILES)){
						//comprobar si se a subido fichero
							if ($_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
								//Buscamos el tipo de tapa al que pertenece
								$tipoTapa=$sql->tipoTapaDeTapa($_SESSION['idTapa']);
								//Borramos la foto anterior
								$fotoAntigua = $sql->fotoDeTapa($_SESSION['idTapa']);
								unlink('../css/img/tapas/'.$tipoTapa.'/'.$fotoAntigua);
								//Subir la foto y creamos un nuevo registro de foto
								move_uploaded_file($_FILES['foto']['tmp_name'],'../css/img/tapas/'.$tipoTapa.'/'.$_FILES['foto']['name']);
								//$sql->insertFoto($nombre, $tipoTapa);
								$nombre=$_FILES['foto']['name'];
								$sql->insertFoto($nombre,$_POST["idTapa"]);
							}else{ echo "<p>Datos modificados, pero la imagen no ha podido ser modificada";}
							//header('Location:../carta.php');
						}
						//echo "<p>Datos de Tapa modificados con éxito</p>";
						header('Location:../carta.php');
						
					}else{
						echo "Se ha producido un error en la modificación de la tapa.";
						//echo $sql->mysqli_error;
					}

										
				?>
			</div>
		</div>
	</div>
</body>
</html>