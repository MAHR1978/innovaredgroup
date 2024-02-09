<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\HorasCancelada;
use App\Interfaces\HoraServiceInterface;
use App\Models\Horario;
use App\Models\Hora;
use App\Models\Usuario;
use App\Models\HoraAtendida;
use App\Models\HoraCancelada;
use App\Models\HoraReservada;
use App\Models\Mascota;
use App\Models\EspecialidadUsuario;
use App\User;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    private $dias = [
        'Lunes','Martes','Miércoles',
        'Jueves','Viernes', 'Sábado', 'Domingo'
        ];
    public function mostrar()
    {
        $veterinarios = Usuario::where('role','=','medico')->get();
        return view('admin.veterinarios', compact('veterinarios'));
    }
    public function verHorarios($id)
    {
        $horarios = Horario::where('veterinario_id','=',$id)->get();

        if(count($horarios) > 0){
            $horarios->map(function($calendario){
                $calendario->dia_inicio = (new Carbon($calendario->dia_inicio))->format('g:i A');
                $calendario->dia_termino = (new Carbon($calendario->dia_termino))->format('g:i A');
                $calendario->tarde_inicio = (new Carbon($calendario->tarde_inicio))->format('g:i A');
                $calendario->tarde_termino = (new Carbon($calendario->tarde_termino))->format('g:i A');
            });
        }else{
            $horarios = collect();
            for($i=0;$i<7;$i++){
                $horarios->push( new Horario());
            }
        }
        
        //dd($horarios->toArray());
        $dias = $this->dias;
        return view('horario.index', compact('dias','horarios'));
    }

    public function getDetalleHoraCancelada($id)
    {
        $id_decrypt = Crypt::decrypt($id);
        $canceladas = HoraCancelada::with('centrosmedicos')->with('veterinarios')->where('id','=',$id_decrypt)->get();
        $pacientes = HoraCancelada::select('paciente_id','mascota_id','motivo')->where('id','=',$id_decrypt)->first();
        $usuario = Usuario::where('id','=',$pacientes->paciente_id)->get();
        $mascotas = Mascota::where('id','=',$pacientes->mascota_id)->get();
        return view('admin.detallecanceladas',compact('canceladas','usuario','mascotas'));

    }
    public function getDetalleHoraReservadas($id)
    {
        $id_decrypt = Crypt::decrypt($id);
        $reservadas = HoraReservada::with('centrosmedicos')->with('veterinarios')->where('hora_id','=',$id_decrypt)->get();
        $paciente = HoraReservada::select('paciente_id','mascota_id')->where('hora_id','=',$id_decrypt)->first();
        $usuario = Usuario::where('id','=',$paciente->paciente_id)->get();
        $mascotas = Mascota::where('id','=',$paciente->mascota_id)->get();
        return view('admin.detallereservadas',compact('reservadas','usuario','mascotas'));

    }


    public function cancelarHora(Request $request)
    {
        $id = $request->id;
        $buscar = Hora::select('veterinario_id', 'duenio_id', 'mascota_id', 'centro_id', 'hora_fecha','hora_hora')->find($id);
        $cancelar = new HoraCancelada();
        $cancelar->veterinario_id = $buscar->veterinario_id;
        $cancelar->paciente_id = $buscar->duenio_id;
        $cancelar->mascota_id = $buscar->mascota_id;
        $cancelar->centro_id = $buscar->centro_id;
        $cancelar->hora_id = $id;
        $cancelar->fecha = $buscar->hora_fecha;
        $cancelar->hora = $buscar->hora_hora;
        $cancelar->status = 'Cancelada';
        $cancelar->cancelada_por = Auth::user()->id;
        $cancelar->role_cancelacion = Auth::user()->role;
        $cancelar->motivo = $request->motivo;
        $cancelar->save();

        $email = User::select('email','name','apellido_paterno','apellido_materno')->where('id','=',$buscar->duenio_id)->first();
        $veterinario = User::select('name','apellido_paterno','apellido_materno')->where('id','=',$buscar->veterinario_id)->first();
        $especialidad = EspecialidadUsuario::with('especialidades')->where('usuario_id','=',$buscar->veterinario_id)->first();

        $mensaje = [
            'nombre' => $email->name.' '.$email->apellido_paterno.' '.$email->apellido_materno,
            'veterinario' => $veterinario->name.' '.$veterinario->apellido_paterno.' '.$veterinario->apellido_materno,
            'especialidad' => $especialidad->especialidades->especialidad,
            'fecha' => $request->hora_fecha,
            'hora' => $carbonTime = (new Carbon($buscar->hora_hora))->format('g:i A'),
            'motivo' => $request->motivo
        ];

        Mail::to($email->email)->send(new HorasCancelada($mensaje));

        $horas = Hora::find($id);
        $horas->delete();

        



        return [
          'message' => 'success'
        ];
    }
}
