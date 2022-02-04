<?php
//error_reporting(E_ERROR | E_PARSE);
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
	
public function abrircrearparaleeroescribir(){
// Abrir archivos
	
$this->iarchivo = fopen($this->rutaarchivo, "a+") or die ("Error al abrir archivo");
//echo "Abrircrear para leer o escribir:" . $this->rutaarchivo ."<br>";

}

public function nuevo(){
	// Abrir archivos
		
	$this->iarchivo = fopen($this->rutaarchivo, "a+") or die ("Error al crear archivo");
	
//	echo "Nuevo :" . $this->rutaarchivo ."<br>";

}
public function copiar($nuevonombre){

	copy( $this->rutaarchivo, $nuevonombre ) or die ("Error al copiar archivo");
//	echo "Copia :" . $this->rutaarchivo . "a :" . $nuevonombre ."<br>";
	$this->rutaarchivo=$nuevonombre;
	
	}
	

	
public function renombrar($nuevonombre){

rename($this->rutaarchivo, $nuevonombre) or die ("Error al renombrar archivo");
//echo "Renombrar :" . $this->rutaarchivo . "a :" . $nuevonombre ."<br>";
$this->rutaarchivo=$nuevonombre;

}

public function borrar(){
unlink($this->rutaarchivo) or die ("Error al borrar");// Eliminar
//echo "Eliminado :" . $this->rutaarchivo . "<br>";
}

public function leer(){

while(!feof($this->iarchivo)) {
	$contenido = fgets($this->iarchivo) or die ("Error de lectura");
	echo $contenido	;
}
//echo "Leer exitoso :" . $this->rutaarchivo . "<br>";
	
}	

public function escribir($texto){
// Escribir
//foreach( $aLineas as $linea )
fwrite($this->iarchivo, $texto) or die ("Error de escritura");
//echo "Escrito exitosamente :" . $this->rutaarchivo . "<br>";

}

public function grabar($linea){
	// Escribir
	  // Obtener cada línea en un array:
	  $lineas = file($this->rutaarchivo);
	foreach( $lineas as $linea )
	fwrite($this->iarchivo, $linea) or die ("Error de escritura");
	//echo "Escrito exitosamente :" . $this->rutaarchivo . "<br>";
	
	}
	
public function cerrar(){

// Cerrar archivo



fclose($this->iarchivo) or die ("Error al cerrar archivo");
//echo "Exito al cerrar archivo :" . $this->rutaarchivo . "<br>";

}



}//clase
?>