<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{   
    //protected $table = 'admin';
    // use HasApiTokens, HasFactory, Notifiable;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'nama',
        'password',
    ];

}
