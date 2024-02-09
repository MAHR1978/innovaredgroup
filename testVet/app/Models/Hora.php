<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hora extends Model
{
    protected $table = 'horas';

    protected $fillable = [
        'veterinario_id','centro_id','hora_fecha','hora_hora','duenio_id','mascota_id'
    ];


    public function centros()
    {
        return $this->belongsTo(Centro::class, 'centro_id');
    }

    public function veterinarios()
    {
        return $this->belongsTo(Usuario::class, 'veterinario_id');
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'duenio_id');
    }

    public function formatHora()
    {
        return (new Carbon($this->hora_hora))->format('g:i A');
    }
}
