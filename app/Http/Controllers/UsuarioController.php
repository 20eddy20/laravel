<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\User;
use Session;
use Redirect;
use Illuminate\Routing\Route;


class UsuarioController extends Controller
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
        | @todo En este constructor se ejecutará tdo los metodos del controlador.
        |
        */
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(2);
        if( $request->ajax() ) {
            return response()->json(view("usuario.users", compact("users"))->render());
        }
        return view("usuario.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        /* Registrar usuario*/
        User::create([
            'name' => $request["name"],
            'email' => $request["email"],
            'password' => $request["password"]
        ]);
        return redirect('/usuario')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('usuario.edit',[ 'user'=>$user ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find( $id );
        $user->fill($request->all());
        $user->save();

        Session::flash('message','Usuario Editado Correctamente.');
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message','Usuario Eliminado Correctamente.');
        return Redirect::to('/usuario');
    }
}
