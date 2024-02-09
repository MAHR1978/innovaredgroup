<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Models\Mascota;
use App\Models\Veterinario;
use App\Models\Especialidad;
use App\Models\Centro;
use App\Models\EspecialidadUsuario;
use App\Models\CentroUsuario;
use App\Models\Usuario;
use App\User;
use Auth;

class VeterinariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidad = Especialidad::all();
        $centros = Centro::all();
        $veterinario =User::select('id','rut','name','apellido_paterno','apellido_materno','email','direccion','fono')->where('role','=','medico')->get();
        return view('veterinario.index', compact('especialidad','centros','veterinario'));
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
        $veterinario = new User();
        $veterinario->rut = $request->rut;
        $veterinario->name = $request->nombre;
        $veterinario->apellido_paterno = $request->apellido_paterno;
        $veterinario->apellido_materno = $request->apellido_materno;
        $veterinario->direccion = $request->direccion;
        $veterinario->fono = $request->fono;
        $veterinario->email = $request->email;
        $pass = '123456';
        $veterinario->password = Hash::make($pass);
        $veterinario->role = 'medico';
        $veterinario->save();

        $centro = new CentroUsuario();
        $centro->usuario_id = $veterinario->id;
        $centro->centro_id = $request->centro;
        $centro->save();
        
        $id_especialidad = $request->especialidad;
        foreach($id_especialidad as $specialty) {
            $especialidad = new EspecialidadUsuario();
            $especialidad->usuario_id = $veterinario->id;
            $especialidad->especialiad_id = $specialty;
            $especialidad->save();
        }
        
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
        try {
        $id_decrypt = Crypt::decrypt($id);
        $centros = Centro::all();
        $especialidades = Especialidad::all();

        $veterinario = Usuario::find($id_decrypt);
        $datosCentro = CentroUsuario::select('centro_id')->where('usuario_id','=',$id_decrypt)->first();
        $centromedico = Centro::select('id','centro')->where('id','=',$datosCentro->centro_id)->first();
        $datosEspecialidad = EspecialidadUsuario::select('especialiad_id')->where('usuario_id','=',$id_decrypt)->first();
        $especialidadmedico = Especialidad::select('id','especialidad')->where('id','=', $datosEspecialidad->especialiad_id)->first();
        } catch (\Exception $exception) {
        return redirect()->back();
        }
        return view('veterinario.edit',compact('veterinario', 'centros', 'especialidades','centromedico','especialidadmedico'));
        //return response()->json($veterinario);
    }
    /*public function edit($id)
    {
        $mascota = Mascota::find($id);
        return response()->json($mascota);
    }*/

    public function editarVeterinario(Request $request)
    {
        
        $id = $request->id;
        $veterinario =  Usuario::find($id);
        $veterinario->rut = $request->rut;
        $veterinario->name = $request->nombre;
        $veterinario->apellido_paterno = $request->apellido_paterno;
        $veterinario->apellido_materno = $request->apellido_materno;
        $veterinario->direccion = $request->direccion;
        $veterinario->fono = $request->fono;
        $veterinario->email = $request->email;
        if(!empty($request->password)){
            $veterinario->password = Hash::make($request->password);
        }
        $veterinario->role = 'medico';
        $veterinario->save();

        $id_centro = $request->centro;
        $centro =  CentroUsuario::where('usuario_id','=',$id)->update(['centro_id' => $id_centro]);
        $id_especialidad = $request->especialidad;
        $especialidad =  EspecialidadUsuario::where('usuario_id','=',$id)->update(['especialiad_id' => $id_especialidad]);
        
        return [
            'message' => 'success'
          ];
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

    /*public function getTableVeterinarios()
    {
        $veterinario = User::Medico()->get();
        //dd($veterinario);
        //exi();
        return Datatables()->of($veterinario)
        ->editColumn('nombre', function ($veterinario) {
            $nombre = $veterinario->name.' '.$veterinario->apellido_paterno.' '.$veterinario->apellido_materno;
            return $nombre; 
        })
        ->addColumn('acciones', function ($veterinario) {
                return '<a href="'. route('veterinario.edit', Crypt::encrypt($veterinario->id)) .'" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Editar Veterinario"><i class="mdi mdi-pencil"></i></a>
                        <a href="'. route('horario', Crypt::encrypt($veterinario->id)) .'" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Horario Veterinario"><i class="mdi mdi-calendar-clock"><i></a>';
            })
        ->rawColumns(['acciones','nombre'])
        ->toJson();
    }*/
}
