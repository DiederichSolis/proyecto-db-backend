<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaRestaurante extends Model
{
    use HasFactory;

    protected $table = 'areas_restaurante';

    
    protected $fillable = [
        'nombre',
        'fumadores',
        'movilidad_mesas',
    ];
}
