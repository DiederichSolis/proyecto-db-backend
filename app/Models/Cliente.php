<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    
    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
    
    ];
 /*
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
*/
}