<?php
	class menu{
		function mostrar(){
			include('conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL
			
			$sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
			$sentencia="SELECT * FROM menu";
			$consulta=$sql->selectSQL($sentencia);
			while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
				echo "<li><a href='".$row['url']."'>".$row['nombre']."</a></li>";
			}
		}
	}
?>