<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblResultadoAprendizaje extends Model
{
    use HasFactory;

    protected $fillable = ['resul_Denominacion'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_resultado_aprendizaje');
    }
}
