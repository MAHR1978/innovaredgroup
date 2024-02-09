<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;
use App\Models\Mascota;
use App\Models\TipoMascota;
use App\Models\EspecialidadUsuario;
use App\Models\HoraAtendida;
use App\Models\HoraCancelada;
use App\Models\Usuario;
use App\Models\Atencion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;

class MascotasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoMascota::all();
        $mascota = Mascota::join('tipo', 'mascota.tipo_id', '=', 'tipo.id')
                    ->where('mascota.id_duenio', Auth::user()->id)
                    ->where('mascota.estado', 1)
                    ->select('mascota.*','tipo.descripcion')
                    ->get();
        
        //$mascota = Mascota::with('tipo')->where('id_duenio','=',Auth::user()->id)->where('estado','=',1)->get();
        return view('micuenta.mascota', compact('tipos','mascota'));
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

    public function ficha()
    {
        return view('mascota.ficha');
    }

    public function buscarFicha(Request $request)
    {
        if(isset($request->rut) && !empty($request->rut)){
            $rut = $request->rut;
            $paciente = Usuario::select('id')->where('rut','=', $rut)->first();
            if($paciente != null){
                $mascota = Mascota::where('id_duenio', '=',$paciente->id)->get();
            }else{
                $mascota = [];
            }
            

        }
        if(isset($request->email) && !empty($request->email)){
            $email = $request->email;
            $paciente = Usuario::select('id')->where('email','=', $email)->first();
            $mascota = Mascota::where('id_duenio', '=',$paciente->id)->get();
            

        }
        if(isset($request->mascota) && !empty($request->mascota)){
            $mascota = $request->mascota;
            $mascota = Mascota::where('nombre', 'like','%' . $mascota. '%')->get();
        }
        
        return [
            'data' => $mascota
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mascotas = new Mascota();
        $mascotas->id_duenio = Auth::user()->id;
        $mascotas->nombre = $request->nombre;
        $mascotas->edad = $request->edad;
        $mascotas->tipo_id = $request->tipo_mascota;
        $mascotas->raza = $request->raza;
        $mascotas->genero = $request->genero;
        $mascotas->enfermedades = $request->enfermedad;
        $mascotas->peso = $request->peso;
        $mascotas->esterilizado = $request->esterilizado;
        $carpeta = 'imagenes/'.Str::slug($request->nombre, "_").'_'.date('his');
        $destinationPath = $carpeta;
        $mascotas->carpeta = $destinationPath;
        if(!empty($request->file('foto'))){
        $imagen = $request->file('foto');
        $filename = $imagen->getClientOriginalName();
        $upload_success = $imagen->move($destinationPath, $filename);
        $mascotas->imagen = $carpeta.'/'.$filename;
        }else{
            $mascotas->imagen = 'nada.jpg';
        }

        $mascotas->estado = 1;
        $mascotas->save();

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
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::find($id);
        return response()->json($mascota);
    }

    public function historial($id)
    {
       // $id_atencion = Crypt::decrypt($id);
     
        //$atenciones = Atencion::with('centros')->with('veterinarios')->with('mascotas')->where('mascota_id','=',$id)->get();
        //dd($atenciones);
        //exit();
       /* $atenciones = Atencion::with(['centros', 'veterinarios', 'mascotas'])
        ->where('mascota_id', $id)
        ->get();*/
        $atenciones = DB::table('atencion')
            ->join('centro', 'atencion.centro_id', '=', 'centro.id')
            ->join('users', 'atencion.veterinario_id', '=', 'users.id')
            ->join('mascota', 'atencion.mascota_id', '=', 'mascota.id')
            ->select('atencion.*', 'centro.centro as nombre_centro', 'users.name as nombre_veterinario','users.apellido_paterno','users.apellido_materno', 'mascota.nombre as nombre_mascota')
            ->where('atencion.mascota_id', '=', $id)
            ->where('users.role','=','medico')
            ->get();
       echo $atenciones;
       return view('mascota.detalle', compact('atenciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       //
    }

    public function editarMascota(Request $request)
    {
        $id = $request->id_mascota;
        $mascota = Mascota::find($id);
        
       
        $mascota->nombre = $request->nombre;
        $mascota->edad = $request->edad;
        $mascota->tipo_id = $request->tipo_mascota;
        $mascota->raza = $request->raza;
        $mascota->genero = $request->genero;
        $mascota->enfermedades = $request->enfermedad;
        $mascota->peso = $request->peso;
        $mascota->esterilizado = $request->esterilizado;
        $carpeta = $request->carpeta;
        $destinationPath = $carpeta;
        if(!empty($request->file('foto'))){
            $mascota->carpeta = $destinationPath;
            $imagen = $request->file('foto');
            $filename = $imagen->getClientOriginalName();
            $upload_success = $imagen->move($destinationPath, $filename);
            $mascota->imagen = $carpeta.'/'.$filename;
        }
        $mascota->save();

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
    public function show($id)
    {
        $mascota = Mascota::find($id);
        $mascota->estado = 0;
        $mascota->save();

        return [
          'message' => 'success'
        ];
    }
    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        $mascota->estado = 1;
        $mascota->save();

        return [
          'message' => 'success'
        ];
    }

   /* public function getTableMascotas()
    {
        $mascota = Mascota::with('tipo')->where('id_duenio','=',Auth::user()->id)->where('estado','=',1)->get();
        return Datatables()->of($mascota)
        ->addColumn('imagen', function ($mascota) {
            return '<img src="'.$mascota->imagen.'" width="90" height="60" />'; 
        })
        ->addColumn('acciones', function ($mascota) {
                return '<button class="btn btn-info btn-sm" onclick="Editar('.$mascota->id.')" data-toggle="tooltip" data-placement="top" title="Editar"><i class="mdi mdi-pencil"></i></button> 
                <button class="btn btn-danger btn-sm" onclick="Eliminar('.$mascota->id.')" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="mdi mdi-cancel"></i></button>
                <a href="'. route('historial', $mascota->id) .'" class="btn btn-warning btn-sm"><i class="mdi mdi-eye" data-toggle="tooltip" data-placement="top" title="Historial Clínico"></i></a>';
            })
        ->rawColumns(['acciones','imagen'])
        ->toJson();
    }*/
}
