<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function teste()
    {
        return view('teste');
    }

    public function parametros($name = 'parametro não informado')
    {
        return 'O parametro recebido pela url é: ' . ($name);
    }
}
