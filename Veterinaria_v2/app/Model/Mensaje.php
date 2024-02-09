<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'nombre','email','telefono','asunto','mensaje'
    ];
}
