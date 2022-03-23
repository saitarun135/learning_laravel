<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    protected $table = 'restaurents';

    public function users()
    {
        $this->belongsTo(User::class);
    }
    
}
