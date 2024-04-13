<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platos extends Model
{
    use HasFactory;


    protected $table = 'platos';

    protected $fillable = [
         'nombre',
         'descripcion',
         'precio',
    ];
    
}
