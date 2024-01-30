<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentroUsuario extends Model
{
    protected $table = 'centro_usuario';

    public function users()
    {
        return $this->hasMany(Usuario::class, 'id_veterinario');
    }
}