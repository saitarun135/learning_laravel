<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    protected $table = 'restaurents';
    
    protected $fillable = ['name','type','admin_id','rating','created_at'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
