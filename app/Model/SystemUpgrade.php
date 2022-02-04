<?php

namespace App\Model;

use \App\Libs\Model;
use \VisualAppeal\AutoUpdate;

class SystemUpgrade extends Model{
	//1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	

	//2	version	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//3	nickname	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//4	importance	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//5	description	text	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

	//6	created_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

	//7	updated_at	timestamp			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	


	public static $auto_upgrade;
//no viene

	public static function checkUpgrade(){
	        $workspace = storage_path("framework/upgrade");
	        $url = \Config::get('horizontcms.sattelite_url')."/updates";

	        $update = new AutoUpdate($workspace.DIRECTORY_SEPARATOR.'temp', public_path() , 60);
            $update->setCurrentVersion(self::getCurrentVersion()->version);
            $update->setUpdateUrl($url);
			//creamos un controlador de log
            $update->addLogHandler(new \Monolog\Handler\StreamHandler($workspace . '/update.log'));
			//crear cache de archivos
	            $update->setCache(new \Desarrolla2\Cache\File($workspace . '/cache'), 3600);
            
            $update->checkUpdate();

            self::$auto_upgrade = $update;

            return self::$auto_upgrade;
	}


	public static function getCore(){
		//no viene
		return self::first();
	}


	public static function getCurrentVersion(){
		//desc no existe description
		return self::orderBy('id','desc')->first();
	}


	public static function getAllAvailable(){
//version
		return array_map(function($version) {
                return (string) $version;
            }, self::$auto_upgrade->getVersionsToUpdate());

	}


	public static function getUpgrades(){
		//no se
		return self::all()->reverse();
	}


	public static function getLatestVersion(){
		//no se
		return self::$auto_upgrade->getLatestVersion();
	}



}
