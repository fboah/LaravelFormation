<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthManager extends Controller
{
    //Login
    public function login()
    {
        return view('login');
    }


    public function loginPost(Request $request)
    {

        $request->validate([
           'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials=$request->only('email','password');

        if(Auth::attempt($credentials)){

            return redirect()->intended((url('/')));
        }

        return redirect()->intended((url('/login')))->with("error","Les informations de connexion sont erronés!");
    }

    public function registrationPost(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
           'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['password']=Hash::make($request->password) ;

        $user=User::create($data);

        if(!$user)
        {
            return redirect()->intended((url('/registration')))->with("error","Les informations de connexion sont erronés!");
        }

        return redirect()->intended((url('/login')))->with("success","Veuillez vous connecter");


    }


    public function logout()
    {
       Session::flush();
       Auth::logout();
       return redirect()->intended(route('/login'));

    }



    //Registration
    public function registration()
    {
        return view('registration');
    }
}
