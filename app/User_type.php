<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $fillable = [
        'user_type_name', 'status',
    ];
}
