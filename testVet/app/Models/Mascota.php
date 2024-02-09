<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascota';

    public function tipo()
    {
    	return $this->belongsTo(TipoMascota::class, 'tipo_id', 'id');
    }

    public function amo()
    {
    	return $this->belongsTo(Usuario::class, 'id_duenio', 'id');
    }

}
