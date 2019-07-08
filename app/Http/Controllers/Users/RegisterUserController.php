<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users.users_list',compact('users'));
    }

    public function create()
    {
        return view('users.user_registration_form');
    }

    public function store(StoreUserRequest $request)
    {   
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
         if(!$user){
            session()->flash('message','User NOT Registered');
            return redirect()->back();
        }
        session()->flash('message','User Registered Succcessfully');
        return redirect('/users/list');
    }
}
