<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cuenta;


class Pagos extends Model
{
    use HasFactory;
    
    protected $table = 'pagos';
   
        protected $fillable = [
            'Id_cuenta',
            'total',
            'metodo',
            'fecha',
        ];
    
        public function cuenta()
        {
            return $this->belongsTo(Cuenta::class, 'Id_cuenta');
        }
    
}
