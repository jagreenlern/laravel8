<?php

namespace App\Controllers\Auth;


use App\Libs\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use \App\Libs\ViewResolver;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';
    protected $redirectAfterLogout = 'admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, ViewResolver $viewResolver){
        parent::__construct($request,$viewResolver);

        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
    *
    * Returns if email or username is for authentication.
    */

    public function username(){
        return 'username';
    }


    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(){

        $this->view->title('Welcome');
        //Carga auth/login.blade.php y pasamos muchos arrays despues en la vista
        return $this->view->render('auth/login',[
                                                    'app_name' => \Config::get('app.name'),
                                                    'admin_logo' => url(\Config::get('horizontcms.admin_logo')),
                                                ]);
    }



    public function logout(Request $request){

        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate(true);

        return redirect($this->redirectAfterLogout);
    }

    
}
