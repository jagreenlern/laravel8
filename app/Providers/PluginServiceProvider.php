<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Contracts\Http\Kernel $kernel)
    {
        $this->kernel = $kernel;

        try{

            if($this->app->isInstalled()){
                $this->app->plugins = \App\Model\Plugin::where('active','1')->get()->keyBy('root_dir');

                $this->registerPluginAutoloaders();

                $this->registerPluginProviders();
                $this->registerPluginMiddlewares();
                $this->registerPluginEvents();
                $this->registerPluginLanguage();
                $this->registerPluginConsoleCommands();
                $this->registerPluginViewPaths();
            }
        }catch(\Exception $e){
            if(\Settings::get('website_debug')==1 && !\Request::is(\Config::get('horizontcms.backend_prefix')."*")){
                throw $e;
            }else if(\Settings::get('admin_debug')==1 && \Request::is(\Config::get('horizontcms.backend_prefix')."*")){
                throw $e;
            }
        }
        
    }


    private function registerPluginAutoLoaders(){
        

       foreach($this->app->plugins as $plugin){

            $autoloader = $plugin->getPath()."vendor/autoload.php";
            if(file_exists($autoloader)){
                require_once($autoloader);
            }
       }


    }


    private function registerPluginProviders(){

            foreach($this->app->plugins as $plugin){

                foreach($plugin->getRegister('addProviders',[]) as $provider){
                    $this->app->register($provider);
                }

            }

    }

    private function registerPluginMiddlewares(){

        foreach($this->app->plugins as $plugin){

            foreach($plugin->getRegister('addMiddlewares',[]) as $alias => $middleware){

               $this->kernel->prependMiddleware($middleware);

                $this->kernel->pushMiddleware($middleware);

                $this->app->router->middleware($alias, $middleware);

            }

        }

    }

    public function registerPluginEvents(){

             foreach($this->app->plugins as $plugin){

                foreach($plugin->getRegister('eventHooks',[]) as $key => $value){
                    foreach($value as $do){
                        \Event::listen($key,$do);
                    }
                }


             }

    }



    private function registerPluginLanguage(){

           if(\Request::is(\Config::get('horizontcms.backend_prefix')."/plugin/run/*")){
      
                $plugin = $this->app->plugins->get(studly_case(\Request::segment(4)));

                if($plugin!=null){
                    $this->loadTranslationsFrom(base_path($plugin->getPath()."/resources/lang"), 'plugin');
                }

            }else if(!\Request::is(\Config::get('horizontcms.backend_prefix')."/*")){
                $theme = \App\Model\Settings::get('theme');

              //  $this->loadTranslationsFrom(base_path("/themes/".$theme."/lang"), 'website');
                $this->loadJsonTranslationsFrom(base_path("/themes/".$theme."/lang"));
            }

    }


    private function registerPluginConsoleCommands(){
        foreach($this->app->plugins as $plugin){
            if(!$plugin->isActive()){continue;}
            foreach($plugin->getRegister('cliCommands',[]) as $command){
                $this->commands([$command]);
            }
        }
    }

    public function registerPluginViewPaths(){


        foreach($this->app->plugins as $plugin){
            if(!$plugin->isActive()){continue;}

            \View::addNamespace(str_slug($plugin->root_dir), [
                                            $plugin->getPath().DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."View",
                                            $plugin->getPath().DIRECTORY_SEPARATOR."resources".DIRECTORY_SEPARATOR."views",
                                        ]);
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }




}
