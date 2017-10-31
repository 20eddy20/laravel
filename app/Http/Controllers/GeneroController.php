<?php

namespace Cinema\Http\Controllers;

use Cinema\genre;
use Cinema\Http\Requests\GeneroCreateRequest;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing(){
        $genres = genre::all();
        return response()->json($genres->toArray());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("genero.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         |--------------------------------------------
         | Obtiene el valor del input que manda ajax (script.js)
         |--------------------------------------------
         | Guarda ese valor en la tabla generos
         | @todo retorna true o false
         |
         */
        if($request->ajax()){
            $data = $request->all();
            if (!empty($data['genre'])){
                genre::create($data);
                return response()->json(["true"]);
            } else {
                return response()->json(["false"]);
            }
        }
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
        $genre = Genre::find($id);
        return response()->json($genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre = genre::find($id);
        $genre->fill($request->all());
        $genre->save();
        return response()->json(["mensaje" => "listo"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
