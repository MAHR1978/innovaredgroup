<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeRecibed;
use App\Models\Mensaje;

class FrontController extends Controller
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
        $contacto = new Mensaje();
        $contacto->nombre = $request->nombre;
        $contacto->email = $request->email;
        $contacto->telefono = $request->fono;
        $contacto->asunto = $request->asunto;
        $contacto->mensaje = $request->mensaje;
        $contacto->save();

        $mensaje = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'fono' => $request->fono,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje
        ];
        //$email = 'consultaveterinaria@upv.cl';

        Mail::to($contacto->email)->send(new MensajeRecibed($mensaje));

        return [
            'message' => 'success'
          ];
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
        //
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
        //
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
