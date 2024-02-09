<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//use App\User;

class Centro extends Model
{
    protected $table = 'centro';

    public function users()
    {
    	return $this->belongsToMany(Usuario::class);
    }

    
}
