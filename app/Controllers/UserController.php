<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Libs\Controller;

use App\Model\User;

class UserController extends Controller{
 

    protected $itemPerPage = 100;
    protected $imagePath = 'images/users';

    /**
     * Creates image directories if they not exists.
     *
     * @return \Illuminate\Http\Response
    */
    public function before(){
        if(!file_exists(storage_path($this->imagePath.'/thumbs'))){
            \File::makeDirectory(storage_path($this->imagePath.'/thumbs'), $mode = 0777, true, true);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug){


        $this->view->title(trans('user.users'));
        //Carga users/index.blade.php y pasamos numer_of_users all_users active_users despues en la vista
        return $this->view->render('users/index',[
                                                        'number_of_users' => User::count(),
                                                        'all_users' => User::paginate($this->itemPerPage),
                                                        'active_users' => User::where('active',1)->count(),
                                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

         if($this->request->isMethod('POST')){

            $user = new User();
            $user->name = $this->request->input('name');
            $user->username = $this->request->input('username');
            $user->slug = str_slug($this->request->input('username'), "-");
            $user->password = $this->request->input('password');
            $user->email = $this->request->input('email');
            $user->role_id = $this->request->input('role_id');
            $user->visits = 0;
            $user->active = 1;
            

            if ($this->request->hasFile('up_file')){
                 
                 $img = $this->request->up_file->store($this->imagePath);

                 $user->image = basename($img);

                 if(extension_loaded('gd')){
                    \Intervention\Image\ImageManagerStatic::make(storage_path($img))->fit(300, 200)->save(storage_path($this->imagePath.'/thumbs/'.$user->image));
                 }
            }


            if($user->save()){

            	return $this->redirect(admin_link("user-edit",$user->id))->withMessage(['success' => trans('message.successfully_created_user')]);
            }else{
                return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);
            }


            
        }


        $this->view->js('resources/js/controls.js');

        $this->view->title(trans('user.create_user'));
        //Carga users/create.blade.php y pasamos muchos arrays despues en la vista
        return $this->view->render('users/create',[
                                                    'current_user' => $this->request->user(),
                                                    'roles' => \App\Model\UserRole::all(),
                                                    'settings' => $this->request->settings,
                                                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $this->view->title(trans('user.view_user'));
        //Carga users/view.blade.php y pasamos user previous_user next_user despues en la vista
        return $this->view->render('users/view',[
                                                    'user' => User::find($id),
                                                    'previous_user' => User::where('id', '<', $id)->max('id'),
                                                    'next_user' =>  User::where('id', '>', $id)->min('id'),
                                                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $this->view->js('resources/js/controls.js');

        $this->view->title(trans('user.edit_user'));
        //Carga users/view.blade.php y pasamos current_user user user_roles despues en la vista
        return $this->view->render('users/edit',[
                                                'current_user' => $this->request->user(),
                                                'user' => User::find($id),
                                                'user_roles' => \App\Model\UserRole::all(),
                                                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id){
        if($this->request->isMethod('POST')){

            $user = User::find($id);
            $user->name = $this->request->input('name');
            $user->username = $this->request->input('username');
            $user->slug = str_slug($this->request->input('username'), "-");
            $user->email = $this->request->input('email');

            if($this->request->has('password')){
                $user->password = $this->request->input('password');
            }

            $user->role_id = $this->request->input('role_id');
           // $user->active = 1;



            if ($this->request->hasFile('up_file')){
                 
                 $img = $this->request->up_file->store($this->imagePath);

                 $user->image = basename($img);

                 if(extension_loaded('gd')){
                    \Intervention\Image\ImageManagerStatic::make(storage_path($img))->fit(300, 200)->save(storage_path($this->imagePath.'/thumbs/'.$user->image));
                 }
            }




            if($user->save()){
                return $this->redirect(admin_link("user-edit",$user->id))->withMessage(['success' => trans('message.successfully_updated_user')]);
            }else{
                return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);
            }


            
        }
    }

    /**
     * Activates a user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id){
        $user = \App\Model\User::find($id);

        $user->active = 1;

        if($user->save()){
            return $this->redirectToSelf()->withMessage(['success' => trans('User successfully activated!')]);
        } else {
            return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);
        }

    }


    /**
     * Remove the specified resource from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        
        if(User::find($id)->delete()){
            return $this->redirect(admin_link("user-index"))->withMessage(['success' => trans('message.successfully_deleted_user')]);
        }


        return $this->redirect(admin_link("user-index"))->withMessage(['danger' => trans('message.something_went_wrong')]);

    }


}
