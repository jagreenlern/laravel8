<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//zona cliente
//no funciona
//use App\Http\Controllers\UserController;

//Route::get('/otros', [WebsiteController::class, 'otros']);



Route::any('/{slug?}/{args?}',function($slug="",$args = null){	


	try{

		$this->router->changeNamespace("Theme\\".Settings::get('theme')."\\App\\Controllers\\");

		$action = explode("/",$args)[0];

		return $this->router->resolve($slug,$action,ltrim($args,$action."/"));
		

	}catch(Exception $e){


		if($e instanceof \App\Exceptions\FileNotFoundException || $e instanceof BadMethodCallException){

			$controller = \App::make('\App\Controllers\WebsiteController');

			$controller->before();

			if(method_exists($controller, $slug)){
				          
				return $controller->callAction($slug, [$slug,$args]);
			}


			return $controller->callAction('index',[$slug,$args]);

		}


		throw $e;
	}


})->where('args', '(.*)');


