<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Encuestas extends Model
{
    use HasFactory;
    protected $table = 'encuestas';

      protected $fillable = [
        'Id_cliente',
        'fecha',
        'calificacion_amabilidad',
        'calificacion_exactitud',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Id_cliente','id');
    }
}
