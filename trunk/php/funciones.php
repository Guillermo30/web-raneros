<?php
class Directorios{
    //Función recursiva para eiminar todos los ficheros o carpetas que contenga la carpeta t despues
    //eliminar dicha carpeta
	public function eliminarDir($carpeta){
		foreach(glob($carpeta . "/*") as $archivos_carpeta)
		{
	
			if (is_dir($archivos_carpeta))
			{
				$this->eliminarDir($archivos_carpeta);
			}
			else
			{
				unlink($archivos_carpeta);
			}
		}
	
		rmdir($carpeta);
	}
		
}


?>