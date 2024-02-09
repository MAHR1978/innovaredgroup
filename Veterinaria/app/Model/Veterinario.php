<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    protected $table = 'veterinario';


    public function especialidad()
    {
    	return $this->belongsTo(Especialidad::class, 'id_especialidad', 'id');
    }

    public function centro()
    {
    	return $this->belongsTo(Centro::class, 'id_centro', 'id');
    }
}
