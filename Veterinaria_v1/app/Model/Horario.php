<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';

    protected $fillable = [
        'dia', 'dia_inicio', 'dia_termino', 'tarde_inicio', 'tarde_termino', 'estado',
        'veterinario_id',
];
}
