<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tblResultadoAprendizaje extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['resul_Denominacion'];

    public function eventos():HasMany
    {
        return $this->hasMany(Evento::class, 'Codigo_resultado_aprendizaje');
    }
}
