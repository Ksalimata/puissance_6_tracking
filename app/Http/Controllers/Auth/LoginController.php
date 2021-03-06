<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Client;
use App\Site;

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
    protected $redirectTo = '/dashboard';

    protected $username = 'username';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        
        if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            // Authentication passed...
            if (Auth::user()->role_id==5) {
                Auth::logout();
                return redirect('/login')->with('erreur','Vous n\'êtes pas autorisé à accéder à cette application');
            }
            return redirect()->intended('/');
            //dd(Auth::user()->username);
        }
        else
            return redirect()->back()->with('erreur','Nom d\'utilisateur ou mot de passe incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function apilogin(Request $request)
    {

        //$this->validateLogin($request);

        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
            $user = $this->guard()->user();
            $user->api_token = str_random(60);
            $user->save();
            
            return response()->json([
                "user" => $user->toArray()
            ]);
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function apilogout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }
}
