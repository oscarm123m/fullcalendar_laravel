<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    
    protected $primaryKey='idclientes';
    protected $fillable=['idclientes','nombre','apellido','documento','celular','email'];
}
