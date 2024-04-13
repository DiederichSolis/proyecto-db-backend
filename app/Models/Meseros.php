<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mesa;
class Meseros extends Model
{
    use HasFactory;

    protected $table = 'meseros';

    protected $fillable = [
        'nombre',
        'Id_mesa',
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'Id_mesa','id');
    }
}
