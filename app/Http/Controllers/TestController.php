<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function methode1($username)
    {
        return 'Bonjour '. $username;
    }

    public function exemple()
    {
        return 'Ceci est un exemple';
    }


    public function accueil()
    {
        return view('accueil');
    }


}
