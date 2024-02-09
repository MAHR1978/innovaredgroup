<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\HoraRecibida;
use App\Mail\CanceladaAdmin;
use App\Interfaces\HoraServiceInterface;
use Yajra\Datatables\Datatables;
use App\Models\Mascota;
use App\Models\TipoMascota;
use App\Models\Centro;
use App\Models\Hora;
use App\Models\EspecialidadUsuario;
use App\Models\HoraAtendida;
use App\Models\HoraCancelada;
use App\Models\HoraReservada;
use App\Models\Atencion;
use App\Models\Mensaje;
use App\User;
use App\Models\Usuario;
use Auth;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;



class HorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
       
       if($role == 'medico')
        {
            //$mishoras = Hora::with('centros')->with('usuarios')->where('status','=','Reservada')->where('veterinario_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->get();
            $mishoras = Hora::select('centro.centro','horas.*','users.name','users.apellido_paterno','users.apellido_materno')
                ->join('centro', 'horas.centro_id', '=', 'centro.id')
                ->join('users', 'horas.veterinario_id', '=', 'users.id')
                ->where('horas.status', '=', 'Reservada')
                ->where('horas.veterinario_id', '=', Auth::user()->id)
                ->orderBy('horas.created_at', 'desc')
                ->get();  
        
        
        }
        else if($role == 'paciente')
        {
            $mishoras = Hora::select('centro.centro','horas.*','users.name','users.apellido_paterno','users.apellido_materno')
                ->join('centro', 'horas.centro_id', '=', 'centro.id')
                ->join('users', 'horas.veterinario_id', '=', 'users.id')
                ->where('horas.status', '=', 'Reservada')
                ->where('horas.duenio_id', '=', Auth::user()->id)
                ->orderBy('horas.created_at', 'desc')
                ->get();          
            
          // $mishoras = Hora::with('centros')->with('veterinarios')->where('status','=','Reservada')->where('duenio_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->get();
            
        }
        else
        {
           // $mishoras = Hora::with('centros')->with('usuarios')->where('status','=','Reservada')->orderBy('created_at', 'desc')->get();
           $mishoras = Hora::select('centro.centro','horas.*','users.name','users.apellido_paterno','users.apellido_materno')
           ->join('centro', 'horas.centro_id', '=', 'centro.id')
           ->join('users', 'horas.veterinario_id', '=', 'users.id')
           ->where('horas.status', '=', 'Reservada')
           //->where('horas.duenio_id', '=', Auth::user()->id)
           ->orderBy('horas.created_at', 'desc')
           ->get();  
        }
        //echo $mishoras;
        if($role == 'medico'){
            $horascanceladas = HoraCancelada::with('centrosmedicos')->with('usuarios')
                            ->where('veterinario_id','=',Auth::user()->id)
                            ->where('status','=','Cancelada')
                            ->orderBy('created_at', 'desc')
                            ->get();
            
            $horasatendidas = HoraAtendida::with('centrosmedicos')->with('usuarios')
                            ->where('veterinario_id','=',Auth::user()->id)
                            ->where('status','=','Atendida')
                            ->orderBy('created_at', 'desc')
                            ->get();
                        
        }else if($role == 'paciente'){
            $horascanceladas = HoraCancelada::with('centrosmedicos')->with('veterinarios')
                            ->where('paciente_id','=',Auth::user()->id)
                            ->where('status','=','Cancelada')
                            ->orderBy('created_at', 'desc')
                            ->get();
                            //dd($horascanceladas);
                            //exit();
            $horasatendidas = HoraAtendida::with('centrosmedicos')->with('veterinarios')
                            ->where('paciente_id','=',Auth::user()->id)
                            ->where('status','=','Atendida')
                            ->orderBy('created_at', 'desc')
                            ->get();

        }else{
            $horascanceladas = HoraCancelada::with('centrosmedicos')->with('veterinarios')
                            ->where('status','=','Cancelada')
                            ->orderBy('created_at', 'desc')
                            ->get();
            $horasatendidas = HoraAtendida::with('centrosmedicos')->with('veterinarios')
                            ->where('status','=','Atendida')
                            ->orderBy('created_at', 'desc')
                            ->get();
        }
        
        
        return view('micuenta.mishoras', compact('horascanceladas','horasatendidas' ,'role','mishoras'));
    }

    



    public function mishoras(HoraServiceInterface $horaService)
    {
        $mi_mascotas = Mascota::where('id_duenio','=',Auth::user()->id)->get();
        $centros = Centro::all();
        $veterinarios = User::Medico()->get();
        $date = old('hora_fecha');
        $doctorId = old('veterinario_id');
        if($date && $doctorId){
            $intervals = $horaService->getAvailableIntervals($date,$doctorId);
        }else{
            $intervals = null;
        }
        return view('micuenta.pedirhora', compact('mi_mascotas','veterinarios','centros','intervals'));
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
    public function store(Request $request, HoraServiceInterface $horaService)
    {
        $rules = [
            'mascota_id' => 'required',
            'veterinario_id' => 'required',
            'centro_id' => 'required',
            'hora_fecha' => 'required',
            'hora_hora' => 'required',
            'pago' => 'required',
    ];
    $messages = [
        'hora_fecha.required' => 'Por favor seleccione una hora válida para su cita.'
    ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) use ($request, $horaService) {
            $date = $request->input('hora_fecha');
            $doctorId = $request->input('veterinario_id');
            $hora_hora = $request->input('hora_hora');
            if($date && $doctorId && $hora_hora){
                $start = new Carbon($hora_hora);
            }else{
                return;
            }
            if(!$horaService->isAvailableIntervals($date, $doctorId, $start)){
                $validator->errors()->add('horasDisponibles', 'La hora seleccionada ya se encuentra tomada por otra mascota');
            }

        });        

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();

        }

        $horas = new Hora();
        $horas->veterinario_id = $request->veterinario_id;
        $horas->centro_id = $request->centro_id;
        $horas->hora_fecha = $request->hora_fecha;
        $carbonTime = Carbon::createFromFormat('g:i A', $request->hora_hora);
        $hora = $carbonTime->format('H:i:s');
        $horas->hora_hora = $hora;
        $horas->duenio_id = Auth::user()->id;
        $horas->mascota_id = $request->mascota_id;
        $horas->save();

        $reservadas = new HoraReservada();
        $reservadas->veterinario_id = $request->veterinario_id;
        $reservadas->centro_id = $request->centro_id;
        $reservadas->paciente_id = Auth::user()->id;
        $reservadas->fecha = $request->hora_fecha;
        $carbonTime = Carbon::createFromFormat('g:i A', $request->hora_hora);
        $hora = $carbonTime->format('H:i:s');
        $reservadas->hora = $hora;
        $carpeta = 'pagos/'.Str::slug(Auth::user()->id, "_").'_'.date('his');
        $destinationPath = $carpeta;
        $reservadas->carpeta = $destinationPath;
        $imagen = $request->file('pago');
        $filename = $imagen->getClientOriginalName();
        $upload_success = $imagen->move($destinationPath, $filename);
        $reservadas->imagen = $carpeta.'/'.$filename;
        $reservadas->status = 'Reservada';
        $reservadas->mascota_id = $request->mascota_id;
        $reservadas->hora_id = $horas->id;
        $reservadas->save();



        $email = User::select('email','name','apellido_paterno','apellido_materno')->where('id','=',Auth::user()->id)->first();
        $veterinario = User::select('email','name','apellido_paterno','apellido_materno')->where('id','=',$request->veterinario_id)->first();
        $especialidad = EspecialidadUsuario::with('especialidades')->where('usuario_id','=',$request->veterinario_id)->first();
        $mensaje = [
            'nombre' => $email->name.' '.$email->apellido_paterno.' '.$email->apellido_materno,
            'veterinario' => $veterinario->name.' '.$veterinario->apellido_paterno.' '.$veterinario->apellido_materno,
            'especialidad' => $especialidad->especialidades->especialidad,
            'fecha' => $request->hora_fecha,
            'hora' => $carbonTime = (new Carbon($hora))->format('g:i A')
        ];

        Mail::to($email->email)->cc($veterinario->email)->send(new HoraRecibida($mensaje));
        return [
            'message' => 'success'
          ];

        //$notification = 'La cita se ha registrado correctamente';
        //return redirect('/horas');

    }



    public function getHorasAtendidas($id)
    {
        $role = Auth::user()->role;
        $id_atencion = Crypt::decrypt($id);
        try {
            if($role == 'medico'){
                $atencion = Atencion::select('id','veterinario_id','centro_id','mascota_id','sintomas','diagnostico','tratamiento','examen','carpeta')->where('id','=',$id_atencion)->first();
                $mascota = Mascota::select('id','id_duenio','nombre','edad','carpeta','imagen','raza','carpeta','tipo_id','genero','enfermedades','peso','esterilizado')->where('id', '=',$atencion->mascota_id)->first();
                $edad = $mascota->edad;
                $nombre_mascota = $mascota->nombre;
                $imagen = $mascota->imagen;
                $raza = $mascota->raza;
                $id_mascota = $mascota->id;
                $carpeta_mascota = $mascota->carpeta;
                $id_duenio = $mascota->id_duenio;
                $usuario = Usuario::select('rut','name','apellido_paterno','apellido_materno','email','direccion','fono')->where('id', '=',$mascota->id_duenio)->first();
                $user = $usuario->name.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
                $centro_medico = Centro::select('centro')->where('id','=',$atencion->centro_id)->first();
                $centro = $centro_medico->centro;
                $sintomas = $atencion->sintomas;
                $diagnostico = $atencion->diagnostico;
                $tratamiento = $atencion->tratamiento;
                $carpeta_examenes = $atencion->carpeta;
                $examen = $atencion->examen;
                $tipo = TipoMascota::select('descripcion')->where('id','=',$mascota->tipo_id)->first();
            
            }else if($role == 'paciente'){
            $atencion = Atencion::select('id','veterinario_id','centro_id','mascota_id','sintomas','diagnostico','tratamiento','examen','carpeta')->where('id','=',$id_atencion)->first();
            $mascota = Mascota::select('id','id_duenio','nombre','edad','carpeta','imagen','raza','carpeta','tipo_id','genero','enfermedades','peso','esterilizado')->where('id', '=',$atencion->mascota_id)->first();
            $edad = $mascota->edad;
            $nombre_mascota = $mascota->nombre;
            $imagen = $mascota->imagen;
            $raza = $mascota->raza;
            $id_mascota = $mascota->id;
            $carpeta_mascota = $mascota->carpeta;
            $id_duenio = $mascota->id_duenio;
            $usuario = Usuario::select('rut','name','apellido_paterno','apellido_materno','email','direccion','fono')->where('id', '=',$atencion->veterinario_id)->first();
            $user = $usuario->name.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
            $centro_medico = Centro::select('centro')->where('id','=',$atencion->centro_id)->first();
            $centro = $centro_medico->centro;
            $sintomas = $atencion->sintomas;
            $diagnostico = $atencion->diagnostico;
            $tratamiento = $atencion->tratamiento;
            $carpeta_examenes = $atencion->carpeta;
            $examen = $atencion->examen;
            $tipo = TipoMascota::select('descripcion')->where('id','=',$mascota->tipo_id)->first();
            }else{
            $atencion = Atencion::select('id','veterinario_id','centro_id','mascota_id','sintomas','diagnostico','tratamiento','examen','carpeta')->where('id','=',$id_atencion)->first();
            $mascota = Mascota::select('id','id_duenio','nombre','edad','carpeta','imagen','raza','carpeta','tipo_id','genero','enfermedades','peso','esterilizado')->where('id', '=',$atencion->mascota_id)->first();
            $edad = $mascota->edad;
            $nombre_mascota = $mascota->nombre;
            $imagen = $mascota->imagen;
            $raza = $mascota->raza;
            $id_mascota = $mascota->id;
            $carpeta_mascota = $mascota->carpeta;
            $id_duenio = $mascota->id_duenio;
            $usuario = Usuario::select('rut','name','apellido_paterno','apellido_materno','email','direccion','fono')->where('id', '=',$atencion->veterinario_id)->first();
            $user = $usuario->name.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
            $centro_medico = Centro::select('centro')->where('id','=',$atencion->centro_id)->first();
            $centro = $centro_medico->centro;
            $sintomas = $atencion->sintomas;
            $diagnostico = $atencion->diagnostico;
            $tratamiento = $atencion->tratamiento;
            $carpeta_examenes = $atencion->carpeta;
            $examen = $atencion->examen;
            $tipo = TipoMascota::select('descripcion')->where('id','=',$mascota->tipo_id)->first();
            $duenio = Usuario::select('rut','name','apellido_paterno','apellido_materno','email','direccion','fono')->where('id', '=',$mascota->id_duenio)->first();
            $duenio_completo = $duenio->name.' '.$duenio->apellido_paterno.' '.$duenio->apellido_materno; 
            }
           
        } catch (\Exception $exception) {
            return redirect()->back();
        }
        return view('micuenta.detalle', compact('user','edad','nombre_mascota',
        'imagen','raza','id_mascota','centro','carpeta_mascota','id_duenio','sintomas','diagnostico','tratamiento','examen','carpeta_examenes','usuario','tipo','mascota'));
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

    public function getDetalleHoraCancelada($id)
    {

        $id_decrypt = Crypt::decrypt($id);
        $canceladas = HoraCancelada::with('centrosmedicos')->with('veterinarios')->where('id','=',$id_decrypt)->get();
        $pacientes = HoraCancelada::select('paciente_id','mascota_id','motivo')->where('id','=',$id_decrypt)->first();
        $usuario = Usuario::where('id','=',$pacientes->paciente_id)->get();
        $mascotas = Mascota::where('id','=',$pacientes->mascota_id)->get();
        
        return view('micuenta.detallecanceladas',compact('canceladas','usuario','mascotas'));

    }
    
    
    public function getUpload(Request $request)
    {
        if(!empty($request->file('examen'))){
            $imagen = $request->file('examen');
            $carpeta = $request->carpeta;
            $destinationPath = $carpeta;
            foreach($imagen as $file) {
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
            }

        }
        
        return [
            'message' => 'success'
          ];

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
        $buscar = Hora::select('veterinario_id', 'duenio_id', 'mascota_id', 'centro_id', 'hora_fecha','hora_hora')->find($id);
        $horacancelada = new HoraCancelada();
        $horacancelada->veterinario_id = $buscar->veterinario_id;
        $horacancelada->paciente_id = $buscar->duenio_id;
        $horacancelada->mascota_id = $buscar->mascota_id;
        $horacancelada->centro_id = $buscar->centro_id;
        $horacancelada->hora_id = $id;
        $horacancelada->fecha = $buscar->hora_fecha;
        $horacancelada->hora = $buscar->hora_hora;
        $horacancelada->status = 'Cancelada';
        $horacancelada->cancelada_por = Auth::user()->id;
        $horacancelada->role_cancelacion = Auth::user()->role;
        $horacancelada->motivo = 'Cancelada por el usuario';
        $horacancelada->save();


        $email = User::select('email','name','apellido_paterno','apellido_materno','fono')->where('id','=',Auth::user()->id)->first();
        $veterinario = User::select('name','apellido_paterno','apellido_materno')->where('id','=',$buscar->veterinario_id)->first();
        $especialidad = EspecialidadUsuario::with('especialidades')->where('usuario_id','=',$buscar->veterinario_id)->first();
        $mensaje = [
            'nombre' => $email->name.' '.$email->apellido_paterno.' '.$email->apellido_materno,
            'veterinario' => $veterinario->name.' '.$veterinario->apellido_paterno.' '.$veterinario->apellido_materno,
            'especialidad' => $especialidad->especialidades->especialidad,
            'fecha' => $carbonDate = (new Carbon($buscar->hora_fecha))->format('d/m/Y'),
            'hora' => $carbonTime = (new Carbon($buscar->hora_hora))->format('g:i A'),
            'email' => $email->email,
            'fono' => $email->fono
        ];

        $admin_email ='consultaveterinaria@upv.cl';
        Mail::to($admin_email)->send(new CanceladaAdmin($mensaje));


        $horas = Hora::find($id);
        $horas->delete();


        return [
          'message' => 'success'
        ];
    }
    public function verCalendario(){


        return view('micuenta.calendario');
    }
    public function listar($user_id)
    {
       // $agenda= Hora::where('veterinario_id', $user_id)->get();
        $role=Auth::user()->role;
        if($role=='medico'){
            $agenda = Hora::select('centro.centro','horas.*','users.name','users.apellido_paterno','users.apellido_materno')
                ->join('centro', 'horas.centro_id', '=', 'centro.id')
                ->join('users', 'horas.veterinario_id', '=', 'users.id')
               // ->where('horas.status', '=', 'Reservada')
                ->where('horas.veterinario_id', '=',$user_id)
                ->orderBy('horas.created_at', 'desc')
                ->get(); 
            $horas = [];

        }
        else if($role=='paciente'){
            $agenda = Hora::select('centro.centro','horas.*','users.name','users.apellido_paterno','users.apellido_materno')
            ->join('centro', 'horas.centro_id', '=', 'centro.id')
            ->join('users', 'horas.veterinario_id', '=', 'users.id')
            ->where('horas.status', '=', 'Reservada')
            ->where('horas.duenio_id', '=',$user_id)
            ->orderBy('horas.created_at', 'desc')
            ->get(); 
             $horas = []; 
        }
        else{
            $agenda = Hora::select('centro.centro','horas.*','users.name','users.apellido_paterno','users.apellido_materno')
            ->join('centro', 'horas.centro_id', '=', 'centro.id')
            ->join('users', 'horas.veterinario_id', '=', 'users.id')
           // ->where('horas.status', '=', 'Reservada')
            //->where('horas.veterinario_id', '=',$user_id)
            ->orderBy('horas.created_at', 'desc')
            ->get(); 
            $horas = []; 
        }
      

        foreach($agenda as $value){
            //print_r($agenda);
          //print_R($value->hora_fecha.' '.$value->hora_hora);

           $horas[] = [
                "id" => $value->id,
                "start" => Carbon::parse($value->hora_fecha." ".$value->hora_hora)->format('Y-m-d H:i:s'),
                "end" => Carbon::parse($value->hora_fecha . ' ' . $value->hora_hora)
                ->addSeconds(2700)
                ->format('Y-m-d H:i:s'),
                "title" => $value->name." ".$value->apellido_paterno." ".$value->apellido_materno,
                "backgroundColor" => $value->estado == 2 ? "#28a745" : ($value->estado==3 && $value->epicrisis==1 ? "#9954BB": "#dc3545"),
                "textColor" => "#fff",
                "extendedProps" =>[
                    "paciente" => $value->duenio_id,
                    'veterinario' => $value->veterinario_id,
                    'fecha' => $value->hora_fecha,
                    'hora' => $value->hora_hora,
                    'estado' =>$value->status,// == 2 ? "AGENDADA" : ($value->estado==3 && $value->epicrisis==1 ? "FINALIZADA CON EPICRISIS": "ATENTIDA")*/
                ]
            ];
            

        }
        return response()->json($horas);
    }


   /* public function getTableMisHoras()
    {
        $role = Auth::user()->role;
        if($role == 'medico'){
            $mishoras = Hora::with('centros')->with('usuarios')->where('status','=','Reservada')->where('veterinario_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }else if($role == 'paciente'){
            $mishoras = Hora::with('centros')->with('veterinarios')->where('status','=','Reservada')->where('duenio_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }else{
            $mishoras = Hora::with('centros')->with('usuarios')->where('status','=','Reservada')->orderBy('created_at', 'desc')->get();
        }
        return Datatables()->of($mishoras)
        ->editColumn('hora_hora', function ($mishoras) {
            return $carbonTime = (new Carbon($mishoras->hora_hora))->format('g:i A'); 
        })
        ->editColumn('hora_fecha', function ($mishoras) {
            return $carbonTime = (new Carbon($mishoras->hora_fecha))->format('d/m/Y'); 
        })
        ->editColumn('persona', function ($mishoras) {
            $role = Auth::user()->role;
            if($role == 'medico' || $role == 'admin'){
                return $nombre = $mishoras->usuarios->name.' '.$mishoras->usuarios->apellido_paterno.' '.$mishoras->usuarios->apellido_materno;
            }else if($role == 'paciente'){
                return $nombre = $mishoras->veterinarios->name.' '.$mishoras->veterinarios->apellido_paterno.' '.$mishoras->veterinarios->apellido_materno; 
            }
            
        })
        ->editColumn('status', function ($mishoras) {

            return '<span class="badge mb-5 badge-info">Reservada</span>'; 
            
        })
        ->addColumn('acciones', function ($mishoras) {
                if(Auth::user()->role == 'paciente'){
                    return '<button class="btn btn-sm btn-danger" onclick="Cancelar('.$mishoras->id.')"><i class="mdi mdi-cancel"></i> Cancelar</button>';
                }else if(Auth::user()->role == 'medico'){
                    return '<a href="'. route('atencion.show', Crypt::encrypt($mishoras->id)) .'" class="btn btn-sm btn-success"><i class="mdi mdi-doctor"></i> Atender</a>';
                }else{
                    return '<button class="btn btn-sm btn-danger" onclick="CancelarAdmin('.$mishoras->id.')"><i class="mdi mdi-cancel"></i> Cancelar</button>
                            <a href="'. route('detalles.reservadas', Crypt::encrypt($mishoras->id)) .'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Detalle"><i class="mdi mdi-feature-search"></i> Detalle</a>';
                }
                
            })
        ->rawColumns(['acciones','hora_hora','persona','status'])
        ->toJson();
    }*/
}
