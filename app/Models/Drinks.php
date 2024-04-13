<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    use HasFactory;

    protected $table = 'drinks';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];
}
