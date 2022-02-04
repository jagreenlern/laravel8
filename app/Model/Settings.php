<?php

namespace App\Model;

use \App\Libs\Model;

class Settings extends Model{
  //tabla
  	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
//	1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	

//		2	setting	varchar(255)	utf8_general_ci		No	Ninguna	Key		Cambiar Cambiar	Eliminar Eliminar	

//		3	value	varchar(4000)	utf8_general_ci		Sí	NULL	Value		Cambiar Cambiar	Eliminar Eliminar	

//		4	more	tinyint(1)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	
  	protected $table = 'settings';
  	public $timestamps = false;
  	public $settings;//setting
  	private static $static_settings = null;//no

	public static function get($setting,$default = null, bool $valueCheck = false){
//setting
		if(!$valueCheck && self::has($setting)){
			
			return self::$static_settings[$setting];
		}

		if($valueCheck && self::has($setting) && self::$static_settings[$setting]!=""){
			return self::$static_settings[$setting];
		}
		
		return $default;
	}

	public static function has($setting){
		//setting
		if(self::$static_settings==null){
			self::$static_settings = self::getAll();	
		}

		return array_key_exists($setting,self::$static_settings);
	}


	public static function getAll(){
//value
		foreach(self::all() as $each){
			$array[$each->setting] = $each->value;
		}


		return $array;
	}


	public function assignAll(){
		//no se
		$settings = self::all();

		$this->settings = new \stdClass();

		foreach($settings as $each){

			if(!empty($each->setting)){
				$this->settings->{$each->setting} = $each->value;
			}
		
		}


	}



}
