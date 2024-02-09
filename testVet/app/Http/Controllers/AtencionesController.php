<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mascota;
use App\Models\TipoMascota;
use App\Models\Centro;
use App\Models\Hora;
use App\Models\EspecialidadUsuario;
use App\Models\HoraAtendida;
use App\Models\HoraCancelada;
use App\Models\Usuario;
use App\Models\Atencion;
use Auth;
use Carbon\Carbon;

class AtencionesController extends Controller
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
        
        return view('atencion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atencion = new Atencion();
        $atencion->mascota_id = $request->mascota_id;
        $atencion->veterinario_id = Auth::user()->id;
        $atencion->sintomas = $request->sintomas;
        $atencion->diagnostico = $request->diagnostico;
        $atencion->fecha_atencion = date('Y-m-d');
        $atencion->centro_id = $request->centro_id;
        $atencion->tratamiento = $request->tratamiento;
        if(!empty($request->file('examen'))){
            $imagen = $request->file('examen');
            foreach($imagen as $file) {
                $carpeta = $request->carpeta_mascota.'/'.'Examenes_'.str_slug($request->nombre_mascota, "_").'_'.date('his');
                $destinationPath = $carpeta;
                $atencion->carpeta = $destinationPath;
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
            }
            $atencion->estado_carga = 1;
            $atencion->examen = 1;

        }else{
            $atencion->estado_carga = 0;
            $atencion->examen = 0;
        }

        $atencion->save();

        $id_atencion = $atencion->id;
        $horaatendida = new HoraAtendida();
        $horaatendida->veterinario_id = Auth::user()->id;
        $horaatendida->paciente_id = $request->duenio_id;
        $horaatendida->atencion_id = $id_atencion;
        $horaatendida->centro_id = $request->centro_id;
        date_default_timezone_set('America/Santiago');
        $horaatendida->fecha = date('Y-m-d');
        $horaatendida->hora = date('H:i:s');
        $horaatendida->status = 'Atendida';
        $horaatendida->save();

        $id_hora = $request->id_hora;
        $hora = Hora::find($id_hora);
        $hora->delete();


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
    
      
        try {
            $id_atencion = Crypt::decrypt($id);
            $hora = Hora::select('id','veterinario_id','centro_id', 'hora_fecha', 'hora_hora','duenio_id','mascota_id')->where('id','=',$id_atencion)->first();
            $centro = $hora->centro_id;
            $id_hora = $hora->id;
            $usuario = Usuario::select('rut','name','apellido_paterno','apellido_materno','email','direccion','fono')->where('id', '=',$hora->duenio_id)->first();
            $user = $usuario->name.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
            $mascota = Mascota::select('id','id_duenio','nombre','edad','carpeta','tipo_id','genero','enfermedades','peso','esterilizado','imagen','raza')->where('id_duenio', '=',$hora->duenio_id)->first();
            $edad = $mascota->edad;
            $nombre_mascota = $mascota->nombre;
            $imagen = $mascota->imagen;
            $raza = $mascota->raza;
            $id_mascota = $mascota->id;
            $carpeta_mascota = $mascota->carpeta;
            $id_duenio = $mascota->id_duenio;
        } catch (\Exception $exception) {
          return redirect()->back();
        }

        return view('atencion.create', compact('user','edad','nombre_mascota',
                                               'imagen','raza','id_mascota','centro','id_hora','carpeta_mascota','id_duenio','mascota','usuario'));
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
