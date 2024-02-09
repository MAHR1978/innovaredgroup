<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centro';

    public function users()
    {
    	return $this->belongsToMany(Usuario::class);
    }

    
}
