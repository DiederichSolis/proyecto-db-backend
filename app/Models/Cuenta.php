<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mesas;
use App\Models\Cliente;

class Cuenta extends Model
{
    protected $table = 'cuenta';

    protected $fillable = [
        'Id_mesa',
        'Id_cliente',
        'estado',
        'total',
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesas::class, 'Id_mesa');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Id_cliente');
    }
}