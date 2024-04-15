<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuenta;
use App\Models\Plato;
use App\Models\Drinks;

class ordenes extends Model
{
    use HasFactory;

    protected $table = 'ordenes';
    
    protected $fillable = [
        'Id_cuenta',
        'Id_bebida',
        'cantidad_bebida',
        'estado'
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'Id_cuenta', 'id');
    }

    public function drink()
    {
        return $this->belongsTo(Drinks::class, 'Id_bebida', 'id');
    }
}
