<?php

class archivo {

public $rutaarchivo="";
public $iarchivo;

public function __construct ($rutaarchivo=""){
	$this->rutaarchivo=$rutaarchivo;
}


public function comprobararchivoexiste() {
	//if(file_exists($this->iarchivo)){
	if (isset($this->iarchivo)){
		echo "El archivo existe!!";
		return TRUE;
	}else{
		echo "NO EXISTE!!";
		return FALSE;
	}
}
	
public function abrirparaleeroescribir(){
// Abrir archivos
//if ($this->comprobararchivoexiste() && ( isset($this->iarchivo) )
	
$this->iarchivo = fopen($this->rutaarchivo, "a+") or die ("Error al abrir archivo");

//}
}

public function renombrar($nuevonombre){
// Renombrar
//if ($this->comprobararchivoexiste() && ( isset($this->iarchivo) ){
rename($this->rutaarchivo, $nuevonombre) or die ("Error al renombrar archivo");;
//}
}

public function eliminar(){
// Eliminar
//if ($this->comprobararchivoexiste() && ( isset($this->iarchivo) ){
unlink($this->rutaarchivo) or die ("Error al borrar");// Eliminar
//}
//unlink('archivito_recopiadito.txt') or die('Error al borrar');) or die('Error al borrar');
}

public function leer(){
// Leer contenido
//if (($this->comprobararchivoexiste() && ( !isset($this->iarchivo) )) $this->abrirparaleeroescribir();

while(!feof($this->iarchivo)) {
	$contenido = fgets($this->iarchivo) or die ("Error de lectura");
	echo $contenido."<br/>";
}
	
}

public function escribir($texto){
// Escribir

fwrite($this->iarchivo, $texto);

}
public function cerrar(){

// Cerrar archivo



fclose($this->iarchivo);

}



}//clase
?>