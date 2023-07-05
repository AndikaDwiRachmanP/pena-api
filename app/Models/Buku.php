<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{   
    use HasFactory, SoftDeletes;
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    // public $timestamps = false;

    protected $fillable = [
        'judul_buku',
        'sinopsis',
        'id_genre',
        'gambar'
    ];



      
    
}
