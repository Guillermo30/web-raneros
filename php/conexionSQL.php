<?php
//Clase que se encargar谩 de conectar con la BD que le indiquemos y de ejecutar las consultas de selecci贸n, inserci贸n o modificaci贸n
class conexionSQL{
   	public $mysqli;

   	//Constructor: Realiza la conexion con la BD y adem醩 crea el objeto mysqli 
   	//que lo asigno a la propiedad p鷅lica de esta clase por si fuese necesario usarlo
	function __construct(){
	    include('constantesConexion.php'); //incluimos fichero donde est醤 incluidas las variables de conexi髇.
		$this->mysqli=new mysqli($host, $usuario,$passwd,$bd);

		if ($this->mysqli->connect_errno) {
			echo "Fall贸 la conexi贸n con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}

	//Funci髇 para realizar sentencias INSERT: devuelve TRUE(1) si se ha realizado correctamente
	public function insertarSQL($sentencia){       
		if(!$this->mysqli->query($sentencia)){
			echo "Error en inserci锟絥 de datos";
            return 0;
		}
        return 1;

	}
	
	//Funci髇 para realizar sentencias SELECT: devuelve el conjunto de resultados para poder manipularlos
	public function selectSQL($sentencia){	     
		return $this->mysqli->query($sentencia);
	}

	//Funci髇 para realizar sentencias UPDATE: devuelve TRUE(1) si se ha realizado correctamente
	public function updateSQL($sentencia){
		if(!$this->mysqli->query($sentencia)){
			echo "Error en sentencia de modificacion de datos";
			return 0;
		}
	return 1;
	}
	
	//Funci髇 para comprobar si existe ya dicho nick en BD
	public function comprobarExisteNick($nick){
		$sentencia="SELECT * From usuario WHERE nick='".$nick."'";
		$resultado=$this->selectSQL($sentencia);
		$fila = $resultado->fetch_assoc();
		if($fila){
			return 1;
		}
		return 0;
	}
	
}

?>