<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $fillable = [
        'user_type_id', 'user_name','user_password','user_full_name','user_phone','user_email','user_address','user_company_info','user_company_address','user_company_phone','user_company_email','user_status',
    ];
}
