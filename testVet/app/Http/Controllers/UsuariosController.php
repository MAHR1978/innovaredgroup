<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id_usuario = Crypt::decrypt($id);
            $usuarios = Usuario::findOrFail($id_usuario);
        } catch (\Exception $exception) {
            return redirect()->back();
        }

        return view('micuenta.mostrar', compact('usuarios'));
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
        
    }

    public function actualizar(Request $request)
    {
        $id = $request->id;
        $datos = Usuario::find($id);
        $datos->name = $request->nombre;
        $datos->apellido_paterno = $request->apellido_paterno;
        $datos->apellido_materno = $request->apellido_materno;
        $datos->email = $request->email;
        $datos->direccion = $request->direccion;
        $datos->fono = $request->fono;
        if(!empty($request->password)){
        $datos->password = $request->password;
        }

        $datos->save();

        return [
            'message' => 'success'
        ];
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