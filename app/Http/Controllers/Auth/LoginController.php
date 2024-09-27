<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       // $this->middleware('auth')->only('logout');
    }
	
	
	public function login(Request $request)
    {		
	
        $credentials = $request->only('email', 'password');		

        if (Auth::attempt($credentials)) {
			if(Auth::user()->isAdmin())
				return redirect(route('home'));	
			else
				return redirect(route('user-home'));
			
        } else {
            // Authentication failed
            return redirect(route('login'))->with(['error' => 'Invalid credentials']);
        }
    } 
   
   
}
