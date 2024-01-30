<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Interfaces\HoraServiceInterface;
use App\Models\Horario;
use App\Models\Hora;
use App\User;
use Auth;
use Carbon\Carbon;

class HorariosController extends Controller
{
   private $dias = [
    'Lunes','Martes','Miércoles',
    'Jueves','Viernes', 'Sábado', 'Domingo'
    ];
    public function index($id)
    {
        $id_decrypt = Crypt::decrypt($id);
        $veterinario = User::select('name','apellido_paterno','apellido_materno')->where('id','=',$id_decrypt)->first();
        $horarios = Horario::where('veterinario_id','=',$id_decrypt)->get();

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
        return view('horario.index', compact('dias','horarios','veterinario','id_decrypt'));
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
        //dd($request->all());
        $activo = $request->input('estado') ?: [];
        $dia_inicio = $request->input('dia_inicio');
        $dia_termino = $request->input('dia_termino');
        $tarde_inicio = $request->input('tarde_inicio');
        $tarde_termino = $request->input('tarde_termino');
        $id_veterinario = $request->input('veterinario_id');
        //dd($request->all());
        //exit();

        $errors = [];
        for($i=0; $i<7; ++$i){
            if($dia_inicio[$i] > $dia_termino[$i]){
                $errors [] = 'Las horas del turno de día son inconsistentes para el día '.$this->dias[$i].'.';
            }
            if($tarde_inicio[$i] > $tarde_termino[$i]){
                $errors [] = 'Las horas del turno de tarde son inconsistentes para el día '.$this->dias[$i].'.';
            }
            Horario::updateOrCreate(
                [
                    'dia' => $i,
                    'veterinario_id' => $id_veterinario
                ],[
                    'estado' => in_array($i, $activo),
                    'dia_inicio' => $dia_inicio[$i],
                    'dia_termino' => $dia_termino[$i],
                    'tarde_inicio' => $tarde_inicio[$i],
                    'tarde_termino' => $tarde_termino[$i]
                ]
                );

        }
        if(count($errors) > 0){
            return back()->with(compact('errors'));
        }else{
            $notification = 'Los cambios se han guradado correctamente';
            return back()->with(compact('notification'));
        }
        

    }



    public function verhoras(Request $request, HoraServiceInterface $horaService)
    {
        $date = $request->input('dia');
        $doctorId = $request->input('veterinario_id');
        
        return $horaService->getAvailableIntervals($date,$doctorId);
         
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
