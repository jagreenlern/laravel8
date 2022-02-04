<?php

namespace App\Model;

use App\Libs\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Notifiable, Authenticatable, Authorizable, CanResetPassword;



    	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
	//1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
    
    //    2	name	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
    //    3	username Índice	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
      //  4	slug	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
        //5	password	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
  //      6	email Índice	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    
    //    7	role_id	int(11)			No	2			Cambiar Cambiar	Eliminar Eliminar	
    
      //  8	visits	int(11)			No	0			Cambiar Cambiar	Eliminar Eliminar	
    
        //9	image	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
        //10	remember_token	varchar(100)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
        //11	created_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
        //12	updated_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    
        //S13	active	tinyint(1)			No	0			Cambiar Cambiar	Eliminar Eliminar	
    
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //jag solo campos que quieres usar en tu app de la tabla
    protected $fillable = [
        'name', 'username' ,'email', 'password','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //hidden atributtes
        'password', 'remember_token',
    ];


    protected $defaultImage = "resources/images/icons/profile.png";


    public static function findBySlug($slug){
        //user

        $user = self::where('slug',$slug)->get()->first();

        if($user!=NULL){
            return $user;
        }else{

            foreach (self::where('slug',NULL)->orWhere('slug',"")->get() as $user) {
                if(str_slug($user->username)==$slug){
                    return $user;
                }
            }

        }

        return NULL;
    }


    public function blogposts(){
        //relacion
		//return $this->belongsTo(\App\Model\Blogpost::class,'blogpost_id','id');
        //relacion con otra tabla
        return $this->hasMany(\App\Model\Blogpost::class,'author_id','id');
    }


    /**
    *
    * If the binded UserRole is missing then ithe method
    * return the default role. 
    *
    */
    public function role(){
//relacion con otra tabla
        if(\App\Model\UserRole::find($this->role_id)==NULL){
                     $this->role_id = 1;
        }
         
        return $this->belongsTo(\App\Model\UserRole::class,'role_id','id');
    }

    public function comments(){
        	//relacion
		//return $this->belongsTo(\App\Model\Blogpost::class,'blogpost_id','id');
        //relacion con otra tabla
    	return $this->hasMany(\App\Model\BlogpostComment::class,'user_id','id');
    }


    public function hasPermission($permission){
        //no see

        if(!isset($this->role->rights) || $this->role->rights==NULL || $this->role->rights==""){
            return false;
        }

        return in_array($permission, $this->role->rights);
    } 

    /**
    *
    * Checking that the user role which the user assegned to,
    * has the right to enter into the admin area. Therefore
    * the user is an admingroup (default: editor, manager, admin) user. 
    * Don't mix up with Admin as a role! 
    *
    */
    public function isAdmin(){
        //no see
        return $this->hasPermission('admin_area');
    }


    public function isActive(){
        //active
        return $this->active==1;
    }


    /**
    *
    * https://erikbelusic.com/tracking-if-a-user-is-online-in-laravel/
    *
    */
    public function isOnline(){
//id
    	return Cache::has('user-is-online-' . $this->id);
	}

    public function getSlug(){
        return ($this->slug!=NULL && $this->slug!="")? $this->slug : str_slug($this->username);
    }

    public function getThumb(){
//image pequña
        if($this->hasImage() && file_exists("storage/images/users/thumbs/".$this->image)){
            return url("storage/images/users/thumbs/".$this->image);
        }else{
            return $this->getImage();
        }

    }

    public function getImage(){
        //image

        if($this->hasImage() && file_exists("storage/images/users/".$this->image)){
            return url("storage/images/users/".$this->image);
        }else{
            return url($this->defaultImage);
        }

    }



    /**
    * Mutator for passwords
    */
    public function setPasswordAttribute($value){
    	$this->attributes['password'] = \Hash::make($value);
    }


    public static function search($search_key){
//username email
        $search_key = '%'.$search_key.'%';

        return self::where('name', 'LIKE' ,$search_key)->orWhere('username', 'LIKE' ,$search_key)->orWhere('email', 'LIKE' ,$search_key)->get();

    }



}
