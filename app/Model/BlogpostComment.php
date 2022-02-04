<?php

namespace App\Model;

use \App\Libs\Model;

class BlogpostComment extends Model{
    //	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
//	1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	

//		2	blogpost_id	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//		3	user_id	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//		4	comment	text	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//		5	created_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//		6	updated_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//		7	active	tinyint(1)			No	1			Cambiar Cambiar	Eliminar Eliminar	

	

	public function blogpost(){
		
		//relacion
		        //comentarios pertenece otra tabla objeto (un blog muchos comentarios)
				//return $this->hasMany(BlogpostComment::class,'blogpost_id','id');
		return $this->belongsTo(\App\Model\Blogpost::class,'blogpost_id','id');
		   
	}
	

	public function user(){
		//relacion con otra tabla
		//return $this->hasMany(\App\Model\BlogpostComment::class,'user_id','id');
		//relacion
		return $this->belongsTo(\App\Model\User::class,'user_id','id');
	}
//falta comments,created_at,created_at,active



}
