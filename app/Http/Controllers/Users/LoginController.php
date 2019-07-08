<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {   
        return view('users.login');
    }

    public function store()
    {   
        if(!(auth()->attempt(request(['username','password'])))) {
            return back()->withErrors([
                'message' => 'Wrong Username or Password'
            ]);
        }
        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();
        return redirect($this->redirectTo);
    }
}
