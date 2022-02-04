<?php

namespace App\Model;

use \App\Libs\Model;

class Blogpost extends Model{

    
    	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
	//1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
    
    //    2	title	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
    //    3	slug	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
    //    4	summary	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
    //    5	text	text	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
    //    6	category_id	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
    //    7	comments_enabled	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
    //    8	author_id	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
        //9	image	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
        //10	created_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
      //  11	updated_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
    //    12	active	tinyint(1)			No	1			Cambiar Cambiar	Eliminar Eliminar	
    
    
    private $rules = array(
                        'title' => 'required',
                        );


    protected $defaultImage = "resources/images/icons/newspaper.png";


    public static function findBySlug($slug){
//slug
        $blogpost = self::where('slug',$slug)->get()->first();

        if($blogpost!=NULL){
            return $blogpost;
        }else{

            foreach (self::where('slug',NULL)->orWhere('slug',"")->get() as $blogpost) {
                if(str_slug($blogpost->title)==$slug){
                    return $blogpost;
                }
            }

        }

        return NULL;
    }

    public static function getPublished(){
        //active
        return self::where('active','>',0)->get();
    }

    public static function getDrafts(){
        //active
        return self::where('active',0)->get();
    }

    public static function getFeatured(){
        //active
        return self::where('active',2)->get();
    }

    public function author(){
         //relacion con otra tabla
         //return $this->hasMany(\App\Model\Blogpost::class,'author_id','id');
        //author pertenece otra tabla objeto
    	 return $this->belongsTo(\App\Model\User::class,'author_id','id'); //In db it has to be author_id else it won't work because Laravel priority is attr -> function
    }   

	public function category(){
        //categoria pertenece otra tabla objeto
//category_ID de otra tabla (categoria muchos blogs	)
//return $this->hasMany(\App\Model\Blogpost::class,'category_id','id');
        return $this->hasOne(BlogpostCategory::class,'id','category_id'); //In db it has to be category_id else it won't work because Laravel priority is attr -> function
	}


	public function comments(){
        //comentarios pertenece otra tabla objeto (un blog muchos comentarios)
		 return $this->hasMany(BlogpostComment::class,'blogpost_id','id');
	}


    public function getSlug(){
        //slug y titulo
        //http://localhost:8080/cursophpudemy/laravel/HorizontCMS-master/blog/welcome-to-horizontcms
        return ($this->slug!=NULL && $this->slug!="")? $this->slug : str_slug($this->title);
    }

	public function getThumb(){
//retorna la ruta de la imagen thumb pequeña

        if($this->hasImage() && file_exists("storage/images/blogposts/thumbs/".$this->image)){
            return url("storage/images/blogposts/thumbs/".$this->image);
        }else{
            return $this->getImage();
        }

	}

    public function getImage(){
////retorna la ruta de la imagen 

    	if($this->hasImage() && file_exists("storage/images/blogposts/".$this->image)){
    		return url("storage/images/blogposts/".$this->image);
    	}else{
    		return url($this->defaultImage);
    	}

    }


    public function getExcerpt($char_num = 255){
//sumario
        if(isset($this->summary) && $this->summary!=""){
            return $this->summary;
        }else{
            return substr(strip_tags($this->text),0,$char_num);
        }
    }

    public function getTotalCharacterCount(){
        //text
        return strlen(strip_tags($this->text));
    }

    public function getTotalWordCount(){
        //text
        return str_word_count(strip_tags($this->text));
    }

    public function getReadingTime(){
        //nose
        return ($this->getTotalWordCount()/200)*60;
    }

    public function isPublished(){
        //activo
        return $this->active > 0;
    }

    public function isDraft(){
        //activo
        return $this->active == 0;
    }

    public function isFeatured(){
        //activo
        return $this->active == 2;
    }

    public static function search($search_key){

        $search_key = '%'.$search_key.'%';

        return self::where('title', 'LIKE' ,$search_key)->orWhere('summary', 'LIKE' ,$search_key)->orWhere('text', 'LIKE' ,$search_key)->get();
    }


}
