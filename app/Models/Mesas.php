<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AreaRestaurante;


class Mesas extends Model
{

    protected $table = 'mesas';
    
    protected $fillable = [
        'Id_area',
        'capacidad',
        'movible',
        'disponible',
        'unida',
    ];

    public function area()
    {
        return $this->belongsTo(AreaRestaurante::class, 'Id_area','id');
    }
}
