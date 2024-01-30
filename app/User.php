<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut','name', 'email', 'password','apellido_paterno','apellido_materno','direccion','fono','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   

    public function scopePaciente($query)
    {
        return $query->where('role','paciente');
    }

    public function scopeMedico($query)
    {
        return $query->where('role','medico');
    }
    public function scopeAdmin($query)
    {
        return $query->where('role','admin');
    }
}
