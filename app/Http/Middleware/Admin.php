<?php

namespace Cinema\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;//Nos da informacion del usuario que esta logeado.
use Session;//mandar mensaje al usuario.

class Admin
{
    protected $auth;

    public function __construct(Guard $auth){
        /*Validar usuario*/
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
        |--------------------------------------------------------------------
        | Middleware - controlar privilegios Si es o no Administrador.
        |--------------------------------------------------------------------
        |
        | @todo Si el ID es distinto de 1 esntonces no es administrador.
        |
        */
        if($this->auth->user()->id != 1){
            Session::flash('message-error','Sin privilegios');
            return redirect()->to('admin');
        }
        return $next($request);
    }
}
