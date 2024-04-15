<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuenta;
use App\Models\Plato;
use App\Models\Drink;

class ordenes extends Model
{
    use HasFactory;

    protected $table = 'ordenesplatos';
    
    protected $fillable = [
        'Id_cuenta',
        'Id_plato',
        'cantidad_platos',
        'estado'
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'Id_cuenta', 'id');
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class, 'Id_plato', 'id');
    }

   
}
