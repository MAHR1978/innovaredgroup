<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';

    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];


    public function mascotas()
    {
    	return $this->hasMany(Mascota::class, 'id_duenio', 'id');
    }

    public function especialidades()
    {
        return $this->hasMany(EspecialidadUsuario::class);
    }


    public function centros()
    {
        return $this->belongsToMany(Centro::class);
    }

}
