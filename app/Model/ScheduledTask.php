<?php

namespace App\Model;

use \App\Libs\Model;

class ScheduledTask extends Model{
	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
	//1	id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	

	//2	name	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//3	command	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//4	arguments	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

	//5	frequency	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	

	//6	ping_before	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

	//7	ping_after	varchar(255)	utf8_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	

	//8	active	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	


    protected $table = 'schedules';//usa schedules tabla
    //faltan mas cosas name,command,arguments,frequency,ping_before,ping_after,active
    public $timestamps = false;


}
