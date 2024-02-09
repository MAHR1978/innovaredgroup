<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMascota extends Model
{
    protected $table = 'tipo';

    public function mascotas()
    {
    	return $this->hasMany(Mascota::class, 'id', 'tipo_mascota');
    }
}
