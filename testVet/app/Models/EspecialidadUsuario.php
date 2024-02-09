<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecialidadUsuario extends Model
{
    protected $table = 'especialidad_usuario';

    protected $fillable = [
        'usuario_id', 'especialidad_id'
    ];
    
    public function users()
    {
        return $this->belongsToMany(Usuario::class);
    }

    public function especialidades()
    {
        return $this->belongsTo(Especialidad::class, 'especialiad_id', 'id');
    }
}