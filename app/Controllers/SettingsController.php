<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Libs\Controller;

use App\Model\Settings;
use \VisualAppeal\AutoUpdate;
use \Jackiedo\LogReader\Facades\LogReader;

class SettingsController extends Controller{

    public function before(){
        if(!file_exists("storage/images/logos")){
          \File::makeDirectory("storage/images/logos", $mode = 0777, true, true);
        }

        if(!file_exists("storage/images/favicons")){
            \File::makeDirectory("storage/images/favicons", $mode = 0777, true, true);
        }

    }


    public function saveSettings(){

        if($this->request->isMethod('POST')){

            foreach($this->request->all() as $key => $value){
              Settings::where('setting', '=', $key)->update(['value' => $value]);
            }

            return $this->redirectToSelf()->withMessage(['success' => trans('message.successfully_saved_settings')]);
        }

    }

    private function getSettingsPanels(){
        
        $backend_prefix = \Config::get('horizontcms.backend_prefix');

        return [
            ['name' => trans('settings.website'),'link' => $backend_prefix.'/settings/website','icon' => 'fa fa-globe'],
            ['name' => trans('settings.admin_area'),'link' => $backend_prefix.'/settings/adminarea','icon' => 'fa fa-desktop'],
            ['name' => trans('settings.update_center'),'link' => $backend_prefix.'/settings/updatecenter','icon' => 'fa fa-arrow-circle-o-up'],
            ['name' => trans('settings.server'),'link' => $backend_prefix.'/settings/server','icon' => 'fa fa-server'],
//                ['name' => trans('settings.email'),'link' => $backend_prefix.'/settings/email','icon' => 'fa fa-envelope'],
            ['name' => trans('settings.social_media'),'link' => $backend_prefix.'/settings/socialmedia','icon' => 'fa fa-thumbs-o-up'],
            ['name' => trans('Log'),'link' => $backend_prefix.'/settings/log', 'icon' => 'fa fa-bug'],
            ['name' => trans('settings.database'),'link' => $backend_prefix.'/settings/database','icon' => 'fa fa-database'],
            ['name' => trans('settings.scheduler'),'link' => $backend_prefix.'/settings/schedules','icon' => 'fa fa-clock-o'],
//                  ['name' => trans('settings.spread'),'link' => $backend_prefix.'/settings/spread','icon' => 'fa fa-paper-plane'],
//                    ['name' => trans('settings.uninstall'),'link' => $backend_prefix.'/settings/uninstall','icon' => 'fa fa-exclamation-triangle'],

            ];

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = 'index'){

        $this->view->title(trans('settings.settings'));
        //Carga settings/index.blade.php y pasamos panels despues en la vista
        return $this->view->render('settings/index',[
                                                        'panels' => $this->getSettingsPanels(),
                                                    ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function website($slug){


        $this->view->title(trans('settings.settings'));
        //Carga settings/website.blade.php y pasamos settings available_logos user_roles despues en la vista
        return $this->view->render('settings/website',[
                                                        'settings' => $this->request->settings,
                                                        'available_logos' => array_slice(scandir("storage/images/logos"),2),
                                                        'user_roles' => \App\Model\UserRole::all(),
                                                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminarea($slug){


        $this->view->title(trans('settings.settings'));
        //Carga settings/adminarea.blade.php y pasamos settings dateFormats available_logos languages despues en la vista
        return $this->view->render('settings/adminarea',[
                                                        'settings' => $this->request->settings,
                                                        'languages' => ['en'=>'English','hu'=>'Magyar'],
                                                        'available_logos' => array_slice(scandir("storage/images/logos"),2),
                                                        'dateFormats' => ['Y.m.d H:i:s','Y-m-d H:i:s','Y. M. d H:i:s', 'd-m-Y H:i:s', 'd/m/Y H:i:s', 'm/d/Y H:i:s'],
                                                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecenter($slug){

        \App\Model\SystemUpgrade::checkUpgrade();

        $this->view->title(trans('settings.settings'));
        //Carga settings/updatecenter.blade.php y pasamos settings current_version latest_version avaliable_list upgrade_list installed_version despues en la vista
        return $this->view->render('settings/updatecenter',[
                                                        'current_version' => \App\Model\SystemUpgrade::getCurrentVersion(),
                                                        'latest_version' => \App\Model\SystemUpgrade::getLatestVersion(),
                                                        'available_list' => array_reverse(\App\Model\SystemUpgrade::getAllAvailable()),
                                                        'upgrade_list' => \App\Model\SystemUpgrade::getUpgrades(),
                                                        'installed_version' => \App\Model\SystemUpgrade::getCore(),

                                                    ]);
    }


    public function sysUpgrade(){
   
        $echo = array();

        $workspace = storage_path("framework/upgrade");
        $url = \Config::get('horizontcms.sattelite_url')."/updates";


        $update = new AutoUpdate($workspace.'/temp', public_path() , 60);
        $update->setCurrentVersion(\App\Model\SystemUpgrade::getCurrentVersion()->version);
        $update->setUpdateUrl($url); //Replace with your server update directory
        // Optional:
        $update->addLogHandler(new \Monolog\Handler\StreamHandler($workspace . '/update.log'));
        $update->setCache(new \Desarrolla2\Cache\File($workspace . '/cache'), 3600);
        //Check for a new update


        if ($update->checkUpdate() === false){
            $echo[] = 'Could not check for updates! See log file for details.';
        } else{ 
        if ($update->newVersionAvailable()) {
            //Install new update
            $echo[] =  'New Version: ' . $update->getLatestVersion() . '<br>';
            $echo[] =  'Installing Updates: <br>';
            $echo[] =  '<pre>';
            $echo[] = print_r(array_map(function($version) {
              		   return (string) $version;
            		}, $update->getVersionsToUpdate()),true);
            $echo[] =  '</pre>';
            // This call will only simulate an update.
            // Set the first argument (simulate) to "false" to install the update
            // i.e. $update->update(false);
            $result = $update->update(false);
            if ($result === true) {
                $echo[] = 'Update successful<br>';
                $sys_upgrade = new \App\Model\SystemUpgrade();
                $sys_upgrade->version = $update->getLatestVersion();
                $sys_upgrade->nickname = "Upgrade";
                $sys_upgrade->importance = "important";
                $sys_upgrade->description = "It was a successful update!";
                $sys_upgrade->save();

                \Artisan::call("migrate",['--no-interaction' => '','--force' => true ]);
            } else {
                $echo[] = 'Update failed: ' . $result . '!<br>';
                if ($result = AutoUpdate::ERROR_SIMULATE) {
                    $echo[] = '<pre>';
                    $echo[] = print_r($update->getSimulationResults(),true);
                    $echo[] = '</pre>';
                }
            }
        } else {
            $echo[] = 'Current Version is up to date<br>';
        }
    }
        $echo[] = 'Log:<br>';
        $echo[] = nl2br(file_get_contents($workspace. '/update.log'));

               
        return $this->redirectToSelf()->with(['upgrade_console' => implode("<br>",$echo)]);
    }



    public function server(){
        $this->view->title("Server");
        //Carga settings/server.blade.php y pasamos server despues en la vista
        return $this->view->render('settings/server',[
                                            'server' => $this->request->server(),
                                        ]);
    }


    public function database(){

        switch(\Config::get('database.default')){

            case 'mysql'  : $tables = \DB::select('SHOW TABLES');
                            break;
            case 'pgsql'  : $tables = \DB::select('SELECT table_name FROM information_schema.tables ORDER BY table_name');
                            break;
            case 'sqlite' : $tables = \DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name"); 
                            break;

            default : $tables = [['name' => 'Could not get table informations']];

        }

    	$this->view->title(trans('settings.database'));
        //Carga setting/database.blade.php y pasamos muchos arrays despues en la vista
    	return $this->view->render('settings/database',[
    												'tables' =>  $tables,

    												]);
    }



    public function socialmedia(){


        if($this->request->isMethod('POST')){

            foreach($this->request->all() as $key => $value){
              Settings::where('setting', '=', "social_link_".$key)->update(['value' => $value]);
            }

            return $this->redirectToSelf()->withMessage(['success' => trans('message.successfully_saved_settings')]);
        }

        $this->view->title("SocialMedia");
        //Carga settings/socialmedia.blade.php y pasamos muchos arrays despues en la vista
        return $this->view->render('settings/socialmedia',[
                                        'all_socialmedia' => \SocialLink::all(),
                                        ]);
    }



    public function log($file){

        LogReader::setLogPath(dirname(\Config::get('logging.channels.'.\Config::get('logging.default').'.path')));

        $entries = collect();
        $files = collect(LogReader::getLogFilenameList());

        if($files->isNotEmpty()){

            $current_file = (isset($file) && $file!="" && $file!=NULL)? $file : basename($files->last());

            $entries = LogReader::filename($current_file)->get();

        }

       // dd($entries);

        $this->view->title("Log files");
        //Carga settings/adminarea.blade.php y pasamos all_files entries entry_number all_file_entries current_file max_files despues en la vista
        return $this->view->render('settings/log',[
                                        'all_files' => $files->reverse(),
                                        'entries' => $entries->reverse(),
                                        'entry_number' => $entries->count(),
                                        'all_file_entries' => LogReader::count(),
                                        'current_file' => isset($current_file)? $current_file : null,
                                        'max_files' => 15
                                        ]);

    }


    public function schedules(){


        $this->view->title("Schedules");
        //Carga settings/adminarea.blade.php y pasamos commands schedules_tasks despues en la vista
        return $this->view->render('settings/schedules',[
                                            'commands' => \Artisan::all(),
                                            'scheduled_tasks' => \App\Model\ScheduledTask::all(),
                                        ]);

    }

}