<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;


class FrontController extends Controller
{
    public function __construct(){
        /*
        |------------------------------------------------------------------------------------
        | Middleware
        |------------------------------------------------------------------------------------
        |
        | Cuando se utiliza el middleware hay que añadir la clase (Authenticate)
        | en el fichero Kernel dentro del array
        | protected $routeMiddleware['auth' => \Cinema\Http\Middleware\Authenticate::class,]
        |
        | En este constructor solo se ejecutará el metodo admin.
        |
        */
        $this->middleware('auth',['only' => 'admin']);
    }

    public function index(){
        return view('index');
   }

   public function contacto(){
        return view('contacto');
   }

   public function reviews(){
        return view('reviews');
   }

   public function admin(){
        return view('admin.index');
   }
}
