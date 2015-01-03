<?php
//Clase que se encargará de conectar con la BD que le indiquemos y de ejecutar las consultas de selección, inserción o modificación
class conexionSQL{
   	public $mysqli;

   	//Constructor: Realiza la conexion con la BD y adem�s crea el objeto mysqli 
   	//que lo asigno a la propiedad p�blica de esta clase por si fuese necesario usarlo
	function __construct(){
	    include('constantesConexion.php'); //incluimos fichero donde est�n incluidas las variables de conexi�n.
		$this->mysqli=new mysqli($host, $usuario,$passwd,$bd);

		if ($this->mysqli->connect_errno) {
			echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}

	//Funci�n para realizar sentencias INSERT: devuelve TRUE(1) si se ha realizado correctamente
	public function insertarSQL($sentencia){       
		if(!$this->mysqli->query($sentencia)){
			echo "Error en inserci�n de datos";
            return 0;
		}
        return 1;

	}
	
	//Funci�n para realizar sentencias SELECT: devuelve el conjunto de resultados para poder manipularlos
	public function selectSQL($sentencia){	     
		return $this->mysqli->query($sentencia);
	}

	//Funci�n para realizar sentencias UPDATE: devuelve TRUE(1) si se ha realizado correctamente
	public function updateSQL($sentencia){
		if(!$this->mysqli->query($sentencia)){
			echo "Error en sentencia de modificacion de datos";
			return 0;
		}
	return 1;
	}
	
	//Funci�n para comprobar si existe ya dicho nick en BD
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