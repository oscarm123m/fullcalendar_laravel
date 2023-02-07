<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    use HasFactory;
    
    protected $primaryKey='idmascotas';
    protected $fillable=['idmascotas','nombre','identificador','tipo','idclientes'];
}
