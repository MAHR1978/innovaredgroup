<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $table = 'atencion';

    public function centros()
    {
        return $this->belongsTo(Centro::class, 'centro_id');
    }

    public function veterinarios()
    {
        return $this->belongsTo(Usuario::class, 'veterinario_id');
    }

    public function mascotas()
    {
        return $this->belongsTo(Mascota::class, 'mascota_id');
    }
}
