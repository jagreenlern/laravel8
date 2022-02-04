<?php

namespace App\Model;

use \App\Libs\Model;

class BlogpostCategory extends Model
{
	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
//	1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	

//	2	name	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//	3	author_id	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//	4	image	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	5	created_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	6	updated_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	


	public $timestamps = false;
    
	public function blogposts(){	
		//return $this->hasOne(BlogpostCategory::class,'id','category_id'); //In db it has to be category_id else it won't work because Laravel priority is attr -> function
		//category_ID de otra tabla (categoria muchos blogs	)
		 return $this->hasMany(\App\Model\Blogpost::class,'category_id','id');
	}

	public function getThumb(){
		//imagen thumb no retorna nada
		return "";
	}
	
	public function getImage(){
		//imagen no retorna nada
		return "";
	}
	//FALTA UNA FUNCION name,create_at,updated_at
	


}
