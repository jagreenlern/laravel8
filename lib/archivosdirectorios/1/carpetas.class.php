<?php

class carpeta {

public $rutacarpeta="";
//public $iarchivo;

public function __construct ($rutacarpeta=""){
	$this->rutacarpeta=$rutacarpeta;
}


public function comprobararchivoexiste() {
	//if(file_exists($this->iarchivo)){
	if (isset($this->rutacarpeta)){
		echo "El archivo existe!!";
		return TRUE;
	}else{
		echo "NO EXISTE!!";
		return FALSE;
	}
}
	

public function renombrar($nuevonombre){
// Renombrar
//if ($this->comprobararchivoexiste() && ( isset($this->iarchivo) ){
rename($this->rutacarpeta, $nuevonombre) or die ("Error al renombrar archivo");;
//}
}

public function eliminar(){
// Eliminar
//if ($this->comprobararchivoexiste() && ( isset($this->iarchivo) ){
unlink($this->rutacarpeta) or die ("Error al borrar");// Eliminar
//}
//unlink('archivito_recopiadito.txt') or die('Error al borrar');) or die('Error al borrar');
}


public function leercontenido(){
	echo "<hr> <h1>Contenido carpeta</h1>";
if($gestor = opendir($this->rutacareta)){
	while(false !== ($archivo = readdir($gestor))){
		if($archivo != '.' && $archivo != '..'){
			echo $archivo."<br/>";
		}
	}
}
	}





}//clase
?>