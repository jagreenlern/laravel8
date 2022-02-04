<?php
error_reporting(E_ERROR | E_PARSE);
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
rename($this->rutacarpeta, $nuevonombre) or die ("Error al renombrar archivo");
echo "Renombrado:" . $this->rutacarpeta . "a :" . $nuevonombre ."<br>";
$this->rutacarpeta=$nuevonombre;

//}
}
public function nuevo(){
	// Renombrar
	//if ($this->comprobararchivoexiste() && ( isset($this->iarchivo) ){
        
	mkdir($this->rutacarpeta,0777) or die ("Error al crear carpetas");
    echo "Nuevo:" . $this->rutacarpeta . "<br>";
	//}
	}



	//Crear nuevos directorios completos
function copiarrecursiva( $nuevonombre ) {
    //error_reporting(0);
    
    if ( is_dir( $this->rutacarpeta ) ) {
        @mkdir( $nuevonombre );
        $d = dir( $this->rutacarpeta );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $this->rutacarpeta . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                full_copy( $Entry, $nuevonombre . '/' . $entry );
                continue;
            }
            copy( $Entry, $nuevonombre . '/' . $entry );
        }
 
        $d->close();
    }else {
        copy( $this->rutacarpeta, $nuevonombre );
    }
    echo "Copia recursiva:" . $this->rutacarpeta . "a :" . $nuevonombre ."<br>";
    $this->rutacarpeta=$nuevonombre;
    
}










    

function borrarcascada($directory="", $empty = false) {
	$directory=$this->rutacarpeta;
    if(substr($directory,-1) == "/") {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return false;
    } elseif(!is_readable($directory)) {
        return false;
    } else {
        $directoryHandle = opendir($directory);
       
        while ($contents = readdir($directoryHandle)) {
            if($contents != '.' && $contents != '..') {
                $path = $directory . "/" . $contents;
               
                if(is_dir($path)) {
                        borrarcascada($path);
                } else {
                    chmod($path,0777);
                    unlink($path);
                }
            }
        }
       
        closedir($directoryHandle);

        if($empty == false) {
        
            chmod($directory,0777);
            if(!rmdir($directory)) {
                echo "Borrado cascada ha fallado " . $this->rutacarpeta . "<br>";
                
                return false;
            }
        }
    
        echo "Borrado cascada:" . $this->rutacarpeta . "<br>";
        return true;
    }
}


public function leercontenido(){
	echo "<hr> <h1>Contenido carpeta</h1>";
if($gestor = opendir($this->rutacarpeta)){
	while(false !== ($archivo = readdir($gestor))){
		if($archivo != '.' && $archivo != '..'){
			echo $archivo."<br/>";
		}
	}
    echo "Leeido contenido:" . $this->rutacarpeta . "<br>";
}

	}



	public function cambiarpermisos($permisos='drwxrwxrwx'){
		

	// Lectura y escritura para el propietario, nada para los demás
//chmod("/directorio/fichero", 0600);

// Lectura y escritura para el propietario, lectura para los demás
//chmod("/directorio/fichero", 0644);

// Todo para el propietario, lectura y ejecución para los otros
//chmod("/directorio/fichero", 0755);

// Todo para el propietario, lectura y ejecución para el grupo del propietario
//chmod("/directorio/fichero", 0750);

		
      //$permisos = 'drwxr-xr-x';  // or whatever
	  //$permisos = 'drwxrwxrwx';  // or whatever
      $mode = 0;

      if ($permisos[1] == 'r') $mode += 0400;
      if ($permisos[2] == 'w') $mode += 0200;
      if ($permisos[3] == 'x') $mode += 0100;
      else if ($permisos[3] == 's') $mode += 04100;
      else if ($permisos[3] == 'S') $mode += 04000;

      if ($permisos[4] == 'r') $mode += 040;
      if ($permisos[5] == 'w') $mode += 020;
      if ($permisos[6] == 'x') $mode += 010;
      else if ($permisos[6] == 's') $mode += 02010;
      else if ($permisos[6] == 'S') $mode += 02000;

      if ($permisos[7] == 'r') $mode += 04;
      if ($permisos[8] == 'w') $mode += 02;
      if ($permisos[9] == 'x') $mode += 01;
      else if ($permisos[9] == 't') $mode += 01001;
      else if ($permisos[9] == 'T') $mode += 01000;
	  echo "<br>Decimal"	.$mode;
	  echo "<br>Octal"	.decoct($mode);
      printf('Mode is %d decimal and %o octal', $mode, $mode);
	  echo "<br>"	.$mode;
	  //Funciona perfectamente hay que compartir la carpeta en windows para ver los permisos
	  $mode="0".decoct($mode);
	  
	  echo "<br>"	.$mode;
	  //los permisos se los pasa por el culo en windows
	  mkdir($this->rutacarpeta, 0777) or die('No se puede crear la carpeta');

	  chmod($this->rutacarpeta, 0777) or die ("Error cambiando los permisos");	
	  
	}


}//clase
?>