<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurent extends Model
{
    use SoftDeletes;
    protected $table = 'restaurents';
    
    protected $fillable = ['name','type','admin_id','rating','created_at'];

    public $timestamps = false;

    public $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
