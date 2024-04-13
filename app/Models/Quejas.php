<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Drink;
use App\Models\Plato;
use App\Models\Mesa;

class Quejas extends Model
{
    use HasFactory;

    protected $table = 'quejas';

        protected $fillable = [
            'Id_cliente',
            'fecha',
            'motivo',
            'clasificacion',
            'persona',
            'Id_bebida',
            'Id_plato',
            'Id_mesa',
        ];
    
        public function cliente()
        {
            return $this->belongsTo(Cliente::class, 'Id_cliente','id');
        }
    
        public function drink()
        {
            return $this->belongsTo(Drink::class, 'Id_bebida','id');
        }
    
        public function plato()
        {
            return $this->belongsTo(Plato::class, 'Id_plato','id');
        }
    
        public function mesa()
        {
            return $this->belongsTo(Mesa::class, 'Id_mesa','id');
        }
}
