<html>
<head>
</head>
<body>
	<h2>Aqui llega?</h2>
	<?php
	//Comprueba si el comentario es sobre una tapa
	if(isset($_POST['idTapa'])){
		include ('constantesConexion.php');
		$mysqli=new mysqli($host, $usuario,$passwd,$bd);
		$sentencia = "INSERT INTO `cometario`(`idcomentario`, `comentario`, `usuario_idusuarios`, `evento_idEvento`, `tapa_idTapa`, `foto_idFoto`) VALUES (NULL,'".$_POST['comentario']."',".$_POST['idUsuario'].",NULL,".$_POST['idTapa'].",NULL)";
		echo $sentencia;
		$mysqli->query($sentencia);
	}
	if(isset($_POST['comentario'])){
		echo "si ay comentario";
	}
	if(isset($_POST['idTapa'])){
		echo "si ay tapa";
	}
	//Devuelve a la pagina anterior
	header ('location:'.$_SERVER['HTTP_REFERER']);
	?>
</body>
</html>
