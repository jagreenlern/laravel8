<?php

namespace App\Model;

use \App\Libs\Model;

class Visits extends Model{
    	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
//	1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	

//		2	date Índice	varchar(25)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//		3	time	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

//		4	ip Índice	varchar(25)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//	5	host_name	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//	6	client_browser	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	
	
    protected $table = 'visits';//afecta a visits no el nombre de la clase 
    public $timestamps = false;

//nuevo visitante
    public static function newVisitor(\Illuminate\Http\Request $request){
    	$visit = null;
		//date,ip,host_name,cliemt_browser

    	try{

    		$visit = new Visits();
    		$visit->date = date('Y-m-d');
    		$visit->time = date('H:i:s');
    		$visit->ip = $request->ip();
    		$visit->host_name = gethostbyaddr($request->ip());
    		$visit->client_browser = $request->header('user_agent');

    		$visit->save();

    	}catch(\Exception $exception){
          //  if($request->input('debug')=='true'){ throw $exception; }
    		//do nothing
    	}

    	return $visit;
    }


	public function getCreatedAtAttribute(){	
		//librerias de fecha que viene por defecto laravel
        return new \Carbon\Carbon($this->date." ".$this->time);
    }






	/*Obtener fecha actual: el método now(), obtiene por defecto la fecha actual del sistema (Servidor).
$date = Carbon::now();
A través de una consulta: Por defecto, los timestamps retornados tras una consulta en Laravel, vienen formateados para ser manipulados con Carbon, por lo que tal como se muestra a continuación solo basta una consulta para empezar a manipular la cadena.
$date = User::find($id)->created_at;
Pasar un string por el método parse(): Esto es bastante común, por ejemplo, cuando construyes tu backend, generalmente recibes las fechas como cadenas de texto (provenientes de inputs), por lo que para manipularlas (con Carbon por ejemplo), debes dar el formato que requiere la librería por ejemplo:
$date = Carbon::parse('2021-03-25');
Ahora que tenemos nuestra fecha lo siguiente es manipularla, para esto te mostrare algunas funciones bastante útiles:

Dar formato a fecha:
$date = $date->format('Y-m-d');
Mostrar solo la fecha
$date->toDateString();
Mostrar solo la hora (Aplica para formatos que almacenan fecha y hora)
$date->toTimeString();
Mostrar fecha y hora:
$date->toDateTimeString();
Sumar fechas
$endDate = $date->addYear();
$endDate = $date->addYears(5);
$endDate = $date->addMonth();
$endDate = $date->addMonths(5);
$endDate = $date->addDay();
$endDate = $date->addDay(5);
Restar fechas
$endDate = $date->subYear();
$endDate = $date->subYears(5);
$endDate = $date->subMonth();
$endDate = $date->subMonths(5);
$endDate = $date->subDay();
$endDate = $date->subDay(5);
Obtener edad a partir de tu fecha de nacimiento
$date = Carbon::createFromDate(1970,19,12)->age;
Conocer que día será mañana
$date = new Carbon('tomorrow');
Conocer que día fue ayer
$date = new Carbon('yesterday’);
Conocer que fecha será el siguiente día de la semana (Lunes en este caso)
$date = new Carbon('next monday');
Conocer que fecha fue cierto día de la semana (Sábado en este caso)
$date = new Carbon('last saturday');
*/
}
