<?php

namespace App\Model;

use \App\Libs\Model;

class UserRole extends Model{
    	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
	//1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
    
    //    2	name	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
    //    3	permission	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
    //    4	rights	text	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
   
	public $timestamps = false;

	
	public function users(){
		//relacion uno a muchos
		$this->hasMany(\App\Model\User::class,'id','rank');
	}


	/**
    * Accessor for rights
    */
    public function getRightsAttribute(){
        //decodifica json rights
        //["admin_area","blogpost","blogpostcategory","blogpostcomment","user","page","filemanager","headerimage","search"]
    	return json_decode($this->attributes['rights']);
    }

	/**
    * Mutator for rights
    */
    public function setRightsAttribute($value){
        //codifica json rights
    	$this->attributes['rights'] = json_encode($value);
    }

    public function isAdminRole(){
        //no se
        $roles = $this->getRightsAttribute();

        return $roles? in_array('admin_area',$roles) : false;
    }

}
