<?php
//Esta carga la zona cliente
namespace App\Controllers;

use Illuminate\Http\Request;
use App\Libs\Controller;

use App\Http\Requests;
use App\Model\Settings;
use App\Libs\ThemeEngine;
use App\Model\Page;

class WebsiteController extends Controller
{

    private $engines = [
                'hcms' => \App\Libs\ThemeEngine::class,
                'blade' => \App\Libs\BladeThemeEngine::class,
                //'twig' => \App\Libs\TwigThemeEngine::class,
                ];

    public $theme;


    public function before(){
        $this->theme = new \App\Libs\Theme($this->request->settings['theme']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page){
        echo "cliente";
        //echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2904.5949039042757!2d-2.961350185133504!3d43.28086188444644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e506d68d8031b%3A0x1276fc00bdb26b1a!2sC.%20Orixe%2C%2022%2C%2048015%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1638891289749!5m2!1ses!2ses" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        if(\Session::has("lang")){
            \App::setLocale(\Session::get("lang"));
        }
        if($this->request->has("lang")){
            \App::setLocale($this->request->input("lang"));
        }

        $theme_engine = new $this->engines[$this->theme->getConfig('theme_engine','hcms')]($this->request);
        
        $theme_engine->setTheme($this->theme);

        $theme_engine->boot();

        $theme_engine->runScript('before');
        


            if($this->request->settings['website_down']==1 && (\Auth::user()==null || !\Auth::user()->isAdmin())){
                return $theme_engine->renderWebsiteDown();
            }

// $var establecido a la primera condicion se cumple se ejecuta lo de ? sino :
            $requested_page = ($page=="" || $page==NULL)? Page::find($this->request->settings['home_page']) : Page::findBySlug($page); 
  
            //nuevo visitante
            \App\Model\Visits::newVisitor($this->request);
          

            if($requested_page!=NULL){
                if(isset($requested_page->url) && $requested_page->url!="" && $theme_engine->templateExists($requested_page->url)){
                    $template = "page_templates.".$requested_page->url;
                }else{
                    $template = 'page';
                }
            }else{
                 return $theme_engine->render404();
            }


            $theme_engine->pageTemplate($template);


            $theme_engine->runScript('before_render');

            echo $requested_page;
       return $theme_engine->render([
                                    '_REQUESTED_PAGE' => $requested_page,
                                    ]);
    }



    public function authenticate(){

//autentificar con username y password
		if (\Auth::attempt(['username' => $this->request->input('username'), 'password' => $this->request->input('password')])) {

            return $this->redirectToSelf()->withMessage(['success' => trans('message.successfully_logged_in')]);//redirigir a si mismo
        }

        return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);//redirigir a si mismo
    }

    public function language(){

        if($this->request->has("lang")){
            //escribir session
            \Session::put('lang',$this->request->input("lang"));
        }
        
        return $this->redirectToSelf();//redirigir a si mismo
    }

    public function search(){
    
        if($this->request->isMethod('POST')){	
            
			if($this->request->input('search')=="" || $this->request->input('search')==null){
				return $this->redirectToSelf();//redirigir a si mismo
			}
            //Carga el buscador
            
			$search_engine = new \App\Libs\SearchEngine();
            //le pasamos los objetos en los que queremos buscar
			$search_engine->registerModel(\App\Model\Blogpost::class);
            $search_engine->registerModel(\App\Model\Page::class);
            $search_engine->registerModel(\App\Model\User::class);    
            //  $this->theme = new \App\Libs\Theme($this->request->settings['theme']);
            //recorrer todos los modelos
            foreach($this->theme->getConfig('search_models',[]) as $model){
                $search_engine->registerModel($model);  
            }
            //buscar
			$search_engine->executeSearch($this->request->input('search'));
            //redirigir
			return $this->redirect(\App\Model\Page::getByFunction('search.php')->slug)->withSearchResult(
																							       $search_engine
																							     );
		}

        return $this->redirectToSelf();//redirigir a si mismo
           
    }

    public function logout(){
        //logout
        \Auth::logout();

        return redirect()->back();//atras
    }

    
    public function ejercicio1(){


        echo "hola";
        //return require_once app_path(). '/themes/jagreen/ejercicio1.php';
        return $this->redirectToSelf();//redirigir a si mismo
        //Carga users/index.blade.php y pasamos numer_of_users all_users active_users despues en la vista
        //return $this->view->render('themes/jagreen/ejercicio1'
                                                      //  'number_of_users' => User::count(),
                                                       // 'all_users' => User::paginate($this->itemPerPage),
                                                       // 'active_users' => User::where('active',1)->count(),
                                                    //);
    }



public function otros($page){
        echo "cliente";
        //echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2904.5949039042757!2d-2.961350185133504!3d43.28086188444644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e506d68d8031b%3A0x1276fc00bdb26b1a!2sC.%20Orixe%2C%2022%2C%2048015%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1638891289749!5m2!1ses!2ses" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        if(\Session::has("lang")){
            \App::setLocale(\Session::get("lang"));
        }
        if($this->request->has("lang")){
            \App::setLocale($this->request->input("lang"));
        }

        $theme_engine = new $this->engines[$this->theme->getConfig('theme_engine','hcms')]($this->request);
        
        $theme_engine->setTheme($this->theme);

        $theme_engine->boot();

        $theme_engine->runScript('before');
        


            if($this->request->settings['website_down']==1 && (\Auth::user()==null || !\Auth::user()->isAdmin())){
                return $theme_engine->renderWebsiteDown();
            }

// $var establecido a la primera condicion se cumple se ejecuta lo de ? sino :
            $requested_page = ($page=="" || $page==NULL)? Page::find($this->request->settings['home_page']) : Page::findBySlug($page); 
  
            //nuevo visitante
            \App\Model\Visits::newVisitor($this->request);
          

            if($requested_page!=NULL){
                if(isset($requested_page->url) && $requested_page->url!="" && $theme_engine->templateExists($requested_page->url)){
                    $template = "page_templates.".$requested_page->url;
                }else{
                    $template = 'page';
                }
            }else{
                 return $theme_engine->render404();
            }


            $theme_engine->pageTemplate($template);


            $theme_engine->runScript('before_render');

            echo $requested_page;
       return $theme_engine->render([
        '_REQUESTED_PAGE' => $requested_page,
        ]);
    }

}
