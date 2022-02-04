<?php
// Desactivar toda las notificaciónes del PHP

//error_reporting(0);

 
// Notificar solamente errores de ejecución

//error_reporting(E_ERROR | E_WARNING | E_PARSE);





// Mostrar todos los errores menos el E_NOTICE

// Valor predeterminado ya descrito en php.ini

//error_reporting(E_ALL ^ E_NOTICE);


//Notificar todos los errores de PHP

//error_reporting(E_ALL);


// Notificar todos los errores de PHP
//error_reporting(-1);

 

// Lo mismo que error_reporting(E_ALL);

//ini_set('error_reporting', E_ALL);


class errorreporting{

    //public $all;
    public $error;
    public $warning;
    public $parse;
    public $notice;
    
    

    public function __construct($error = TRUE,$warning = TRUE,$parse=TRUE,$notice = TRUE)
    {
        
        $this->error = $error;
        $this->warning = $warning;
        $this->parse = $parse;
        $this->notice = $notice;
        
    }

    public function errorreporting(){
        if (($this->error==TRUE) && ($this->warning==TRUE) && ($this->parse==TRUE) && ($this->notice==TRUE))
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        elseif (($this->error==TRUE) && ($this->warning==TRUE) && ($this->parse==TRUE))
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        elseif (($this->error==TRUE) && ($this->warning==TRUE))
        error_reporting(E_ERROR | E_WARNING);
        elseif ($this->error==TRUE)
        error_reporting(E_ERROR);
        else
        error_reporting();
    
    
    }//funcion


    
}//class

?>