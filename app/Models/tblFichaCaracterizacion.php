<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblFichaCaracterizacion extends Model
{
    use HasFactory;

    protected $fillable = ['fich_Inicio','fich_Fin','fich_Etapa'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_ficha');
    }
}
