<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Organizer extends Authenticatable
{    
    use HasFactory, HasApiTokens;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'phone_number',
        'role',

        'status',
        'email',
        'password',
        'original_password',
    ];

    protected $hidden = ['password', 'remember_token'];
}
