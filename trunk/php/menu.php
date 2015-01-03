<?php
	class menu{
		public $sql;
		
		function __construct(){
			include('conexionSQL.php'); //Incluimos el fichero donde está la clase conexionSQL			
			$this->sql=new conexionSQL(); //instanciamos objeto de la clase creada en el fichero "conexionSQL"
		}
		function mostrar(){
			
			$sentencia="SELECT * FROM menu";
			$consulta=$this->sql->selectSQL($sentencia);
			while($row=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
				echo "<li><a href='".$row['url']."'>".$row['nombre']."</a></li>";
			}
			
			
		}
	}
?>