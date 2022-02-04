<?php

namespace App\Model;

use \App\Libs\Model;

class Plugin extends Model
{
		#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
		//1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
		
		//	2	root_dir Índice	varchar(255)	utf8_general_ci		No	Ninguna	Plugin context		Cambiar Cambiar	Eliminar Eliminar	
		
		//	3	area	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
		
		//	4	permission	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
		
		//	5	tables	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
		
		//	6	active	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
		
		
    public $timestamps = false;
	//Todos los campos bien menos table_name es tables
    protected $fillable = ['id','root_dir','area','permission','table_name','active'];
    private $info = null;

	public function __construct($root_dir = null){	

		if($root_dir!==null && !is_array($root_dir)){

			$eloquent = self::where('root_dir',$root_dir)->get();

			if($eloquent!=null){

				$attributes = $eloquent->toArray();

				!isset($attributes[0])? : $attributes = $attributes[0];

				$this->fill($attributes);

			}
		
		}


		isset($this->root_dir) ? : $this->setRootDir($root_dir);	
		
	}

	public function setRootDir($root_dir){
		//root_dir
		$this->root_dir = $root_dir;
	}

	public function exists(){
		return file_exists($this->getPath());
	}

    public function isInstalled(){
		//root_dir
    	$result = self::where('root_dir',$this->root_dir)->get();

    	return !$result->isEmpty();
    }

    public function isActive(){
		//root_dir
    	
    	return ($this->isInstalled() && $this->active==1);
    }

	public function getConfig($config, $default = NULL){
//no se
		isset($this->config)? : $this->config = file_exists($this->getPath()."config.php")? require($this->getPath()."config.php") : NULL;

		return isset($this->config[$config])? $this->config[$config]: $default;
	}

	public function getName(){
		//no se
		return $this->getInfo('name')==NULL? $this->root_dir : $this->getInfo('name');
	}

	public function getNamespaceFor($for){
		//root_dir
		return "\Plugin\\".$this->root_dir."\\App\\".ucfirst($for)."\\";
	}

	public function getSlug(){
		//root_dir
		return namespace_to_slug($this->root_dir);
	}

	public function getPath(){
		//root_dir
		return 'plugins'.DIRECTORY_SEPARATOR.$this->root_dir.DIRECTORY_SEPARATOR;
	}

	public function getDatabaseFilesPath(){
//no se
		$path_to_db = $this->getPath().'database';

		if(file_exists($path_to_db) && is_dir($path_to_db)){
			return $this->getPath().'database';
		}
	 
		return NULL;
	}


	public function getIcon(){
		//no se	
		return file_exists($this->getPath()."icon.jpg")? $this->getPath()."icon.jpg" : 'resources/images/icons/plugin.png';
	}

	private function loadInfoFromFile(){
//no se
		$file_without_extension = $this->getPath()."plugin_info";
		
		if(file_exists($file_without_extension.".yml") && class_exists('\Symfony\Component\Yaml\Yaml')){
			$this->setAllInfo( (object) \Symfony\Component\Yaml\Yaml::parse(
																	file_get_contents($file_without_extension.".yml"),
																	\Symfony\Component\Yaml\Yaml::PARSE_OBJECT
																  ));
		}else if(file_exists($file_without_extension.".json")){
				$this->setAllInfo( json_decode(file_get_contents($file_without_extension.".json")) );
		}else if(file_exists($file_without_extension.".xml")){
				$this->setAllInfo(simplexml_load_file($file_without_extension.".xml"));
			}

	}

	public function hasInfo(){
		//no se
		return isset($this->info);
	}

	public function setAllInfo($all_info){
	//no se
		$this->info = $all_info;
	
	}

	public function getInfo($info){
		//no se

		if(!$this->hasInfo()){
			$this->loadInfoFromFile();
		}

		return isset($this->info->{$info})? $this->info->{$info}: NULL;
	}

	public function getShortCode(){
		//root_dir
		return "{[".$this->root_dir."]}";
	}

	
	public function hasRegisterClass(){
		//no se
		return class_exists($this->getRegisterClass());
	}

	public function getRegisterClass(){
		//root_dir
		return "\Plugin\\".$this->root_dir."\Register";
	}

	public function hasRegister($register){
		//no sE
		return method_exists($this->getRegisterClass(),$register);
	}


	public function getRegister($register,$default = null){
//no se
		$plugin_namespace = $this->getRegisterClass();

		if($this->hasRegister($register)){
            return $plugin_namespace::$register();
        }

        return $default;
	}


	public function getRequirements(){
		//no se
		return $this->getInfo('requires');
	}

	public function getRequiredCoreVersion(){
		//no se
		return isset($this->getInfo('requires')->core)? $this->getInfo('requires')->core : NULL;
	}

	public function isCompatibleWithCore(){
//no se
		$currentVersion = \App\Model\SystemUpgrade::getCurrentVersion()->version;
		$currentVersion = isset($currentVersion)? $currentVersion : \Config::get('horizontcms.version');

		return \Composer\Semver\Comparator::greaterThanOrEqualTo($currentVersion,$this->getRequiredCoreVersion());
	}


}
