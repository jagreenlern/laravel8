<?php

namespace App\Model;

use \App\Libs\Model;

class HeaderImage extends Model
{

	//1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
	
	//	2	title	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	
	//	3	image	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	
	//	4	order	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	
	
    public $timestamps = false;

    public function getImage(){
		//header image

    	if($this->hasImage() && file_exists("storage/images/header_images/".$this->image)){
    		return url("storage/images/header_images/".$this->image);
    	}else{
    		return "";
    	}

    }
}
