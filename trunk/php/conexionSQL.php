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
			echo $this->mysqli_error;
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
	public function ultimaId($tabla){
		//$sentencia="SELECT last_insert_id() FROM ".$tabla;
		$sentencia="SELECT MAX(id".$tabla.") FROM ".$tabla;
		//echo $sentencia."         ";
		if($this->mysqli->query($sentencia)){
			$resultado=$this->mysqli->query($sentencia);
			$fila = $resultado->fetch_array();
			//echo $fila[0]."         ";
			return $fila[0];
		}else{
			echo $this->mysqli->error;
		}
		
	}
	public function tipoTapaDeTapa($idtapa){
		$sentencia="SELECT tipoTapa_idTipoTapa FROM tapa WHERE idTapa='".$idtapa."'";
		$idTipoTapa = $this->mysqli->query($sentencia)->fetch_array();
		$sentencia="SELECT nombre FROM tipotapa WHERE idTipoTapa='".$idTipoTapa[0]."'";
		$resultado = $this->mysqli->query($sentencia)->fetch_array();
		return $resultado[0];
	}
	public function tipoTapa(){
		$sentencia="SELECT * FROM tipoTapa";
		$resultado = $this->mysqli->query($sentencia)->fetch_array();
		return $resultado;
	}
	public function fotoDeTapa($idtapa){
		$sentencia="SELECT foto FROM foto WHERE tapa_idtapa='".$idtapa."'";
		$resultado = $this->mysqli->query($sentencia)->fetch_array();
		return $resultado[0];
	}
	public function insertFoto($nombre, $idTapa){
		$idFoto=$this->ultimaId('foto'); //**
		$idFoto++; //**
		$sentencia="INSERT INTO foto(idFoto, foto, album_idAlbum, tapa_idtapa) VALUES ('".$idFoto."', '".$nombre."','1','".$idTapa."')";
		//echo $sentencia;
		if(!$this->insertarSQl($sentencia)){
			echo $this->mysqli->error;
			
		}
		
	}
	public function borrarFotoTapa($idTapa){
		$sentencia="DELETE FROM foto WHERE tapa_idTapa='".$idTapa."'";
		if(!$this->mysqli->query($sentencia)){
			echo $this->mysqli->error;
			return false;
		}
		return true;
	}
}

?>