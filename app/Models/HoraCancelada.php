<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HoraCancelada extends Model
{
    protected $table = 'horas_canceladas';

    public function centrosmedicos()
    {
        return $this->belongsTo(Centro::class, 'centro_id');
    }

    public function veterinarios()
    {
        return $this->belongsTo(Usuario::class, 'veterinario_id');
    }


    public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'paciente_id');
    }

    public function formatFecha()
    {
        return (new Carbon($this->fecha))->format('d/m/Y');
    }

    public function formatHora()
    {
        return (new Carbon($this->hora))->format('g:i A');
    }
}
