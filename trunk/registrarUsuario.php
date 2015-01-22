<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link type="text/javascript" src="scripts/validacion.js"></link>
	<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section -->
</head>
<body>
	<div id="contenido">
		  <?php include('php/cabecera.php');?>
		<div id="menuID" class="menu">
			<?php 
				include('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
				
			?>
		</div>
		<br></br>
		<div id="contenedorCuerpo">
			<?php
			$correoUsuario=0;
			if(isset($_POST['correoUsu'])){
				$correoUsuario=1;
			}
			//echo $correoUsuario;
				//include('php/constantesConexion.php');
                //include('php/conexionSQL.php');  //Incluimos fichero donde está la clase "conexionSQL" creada para poder instanciarla
				$newPassword = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT); //función para crear codigo hash de contraseña
				$nick=$_POST['nick'];
                $sql=new conexionSQL(); //instanciamos objeto de la clase sentenciaSQL creada
                
                //Creamos este if para comprobar si ya existe en BD el nick del nuevo usuario
                if(!$sql->comprobarExisteNick($nick)){
					
					
					
					$sentencia = "INSERT INTO usuario(idusuarios, nombre, apellidos, nick, password, esRoot,email,aceptarCorreo) VALUES ('NULL', '".$_POST['nombre']."','".$_POST['apellidos']."','".$nick."','".$newPassword."', False,'".$_POST['correo']."','{$correoUsuario}')";
					
					if($sql->insertarSQL($sentencia)){  //realizamos el Insert con la sentencia anterior
						echo "<h3>Los Raneros nos enorgullece darle la Bienvenida</h3>";
	                    echo "</br><p>Hola ".$_POST['nick']."</p>";
// 	                    session_start();
	                }
					else
					{
					    echo $sql->mysqli->error;
						echo "<p>Por motivos de mantenimiento no hemos podido atender tu solicitud. Intentelo más tarde y disculpe las molestias.</p>";
						//echo $consulta;
	
					}
				}else{
					echo "El nick elegido ya existe, vuelva a intentarlo eligiendo otro nick";		
				}
			?>
		</div>
		 <?php include('php/pie.php');?>
	</div>
</body>
</html>