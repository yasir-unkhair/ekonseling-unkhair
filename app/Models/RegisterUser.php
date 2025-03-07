<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    //
    protected $table = 'app_register_users';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'is_active',
    ];
}
