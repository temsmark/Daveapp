<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
//    protected $redirectTo = '/home';
    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id==1){
            return redirect('/dashboard');
        }elseif ($user->role_id==5){
            return redirect('/finance');
        }elseif ($user->role_id==4){
            return redirect('/dean');
        }elseif($user->role_id==2){
            return redirect('/chairman');
        }elseif($user->role_id==3){
            return redirect('/director');
        }elseif ($user->role_id==6){
            return redirect('/user');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
