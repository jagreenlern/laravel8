<?php

namespace App\Model;

use \App\Libs\Model;

class Page extends Model{
	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
//	1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	

//	2	name	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//	3	slug	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//	4	url	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	5	visibility	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//	6	parent_id	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	7	queue	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//	8	language	varchar(255)	utf8_general_ci		No	en			Cambiar Cambiar	Eliminar Eliminar	

//	9	page	text	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	10	author_id	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//	11	image	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	12	created_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	13	updated_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

//	14	active	tinyint(1)			No	1			Cambiar Cambiar	Eliminar Eliminar	


    protected $defaultImage = "resources/images/icons/page.png";

    public static function home(){

        //no se loq que hace 
        return self::find(Settings::get('home_page'));
    }

    public static function getByFunction($function){
        //le pasamos url y retorna la primera que encuetra cuando coinciden
        return self::where('url',$function)->get()->first();        
    }


    public static function findBySlug($slug){
//le pasamos slug y retorna la primera que encuetra cuando coinciden
        $page = self::where('slug',$slug)->get()->first();

        if($page!=NULL){
            return $page;
        }else{

            foreach (self::where('slug',NULL)->orWhere('slug',"")->get() as $page) {
                if(str_slug($page->name)==$slug){
                    return $page;
                }
            }

        }

        return NULL;
    }

    public static function activeMain(){
        //devuelve  las visibles.
         return self::where('visibility',1)->where('parent_id',NULL)->orderBy('queue')->orderBy('id')->get();
    }

    public static function active(){
        //devuelve las activas
        return self::where('visibility',1)->orderBy('queue')->orderBy('id')->get();
    }

    public function isActive(){
        return $this->visibility==1;
    }

    public function isParent(){
        //devuelve las padre
        return $this->parent_id==NULL;
    }

    public function hasSubpages(){
        //recursivo
        return $this->subpages->count()>0;
    }

    public function parent(){
        //recursivos
        return $this->belongsTo(self::class,'parent_id','id');
    }


    public function subpages(){
        //recursivos
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function author(){
        //De otro objeto o tabla
        return $this->belongsTo(\App\Model\User::class,'author_id','id'); //In db it has to be author_id else it won't work because Laravel priority is attr -> function
   }   

    public function getSlug(){
        //retorna el slug con el nombre
        return ($this->slug!=NULL && $this->slug!="")? $this->slug : str_slug($this->name);
    }

   	public function getThumb(){
//retorna la url de la thumb de la imagen
        if($this->hasImage() && file_exists("storage/images/pages/thumbs/".$this->image)){
            return url("storage/images/pages/thumbs/".$this->image);
        }else{
            return $this->getImage();
        }

	}


    public function getImage(){
//retorna la url de la imagen
    	if($this->hasImage() && file_exists("storage/images/pages/".$this->image)){
    		return url("storage/images/pages/".$this->image);
    	}else{
    		return url($this->defaultImage);
    	}

    }


    public static function search($search_key){
//retorna la search key que buscamos que coincide con page o name
        $search_key = '%'.$search_key.'%';

        return self::where('name', 'LIKE' ,$search_key)->orWhere('page', 'LIKE' ,$search_key)->get();

    }


}
