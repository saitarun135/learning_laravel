<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSection extends Model
{
    protected $table ='user';

    protected $fillable =[
        'first_name','last_name','phone_number'
    ];
}
