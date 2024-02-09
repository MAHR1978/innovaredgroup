<?php namespace App\Services;

use App\Models\Horario;
use App\Models\Hora;
use App\Interfaces\HoraServiceInterface;
use Carbon\Carbon;

class HoraService implements HoraServiceInterface
{

    private function getDayFromDate($date)
    {
        $datecarbon = new Carbon($date);
        $i = $datecarbon->dayOfWeek;
        $day = ($i==0 ? 6 : $i-1);
        return $day;
    }

    public function isAvailableIntervals($date, $doctorId, Carbon $start)
    {
        $exists = Hora::where('veterinario_id', '=', $doctorId)
                                ->where('hora_fecha', '=', $date)
                                ->where('hora_hora', '=', $start->format('H:i:s'))
                                ->exists();
        return !$exists;
    }

    public function getAvailableIntervals($date, $doctorId)
    {
       
    	$hoy = date('Y-m-d');   
       
        $dias=$this->getDayFromDate($date);
       // echo $dias;


        date_default_timezone_set('America/Santiago');     
       // echo date_default_timezone_set('America/Santiago'); 
        $ahora = date('H:i').':00';
        $ahora = date("H:i",strtotime($ahora)+3600).':00';
       
        $horario = Horario::where('estado','=',1)
       //->where('dia','=',$this->getDayFromDate($date))
        ->where('veterinario_id','=', $doctorId)
        ->first([
            'dia_inicio', 'dia_termino',
            'tarde_inicio', 'tarde_termino'
        ]);
       // print_r($horario);

        if(!$horario){
                return [];
            }
            if($hoy == $date){
                $IntervalosDia = $this->getIntervalos(
                    $ahora, $horario->dia_termino,
                    $hoy, $doctorId
                );
                $IntervalosTarde = $this->getIntervalos(
                    $ahora, $horario->tarde_termino,
                    $hoy, $doctorId
                );

            }else{
                $IntervalosDia = $this->getIntervalos(
                    $horario->dia_inicio, $horario->dia_termino,
                    $date, $doctorId
                );
                $IntervalosTarde = $this->getIntervalos(
                    $horario->tarde_inicio, $horario->tarde_termino,
                    $date, $doctorId
                );
            }
            
            $data = [];
            $data['dia'] = $IntervalosDia;
            $data['tarde'] = $IntervalosTarde;
            return $data;

    }


        private function getIntervalos($start, $end, $date, $doctorId)
        {
            $start = new Carbon($start);
            $end = new Carbon($end);
            $intervalos = [];
            while($start < $end){
                $intervalo = [];
                $intervalo['inicio'] = $start->format('g:i A'); 
                $avaliable = $this->isAvailableIntervals($date, $doctorId, $start);
                $start->addMinutes(30);
               
                $intervalo['termino'] = $start->format('g:i A'); 
                if($avaliable){
                    $intervalos [] = $intervalo;
                }
                
                
            }
            return $intervalos;
        }
}