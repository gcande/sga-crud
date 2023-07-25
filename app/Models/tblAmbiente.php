<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblAmbiente extends Model
{
    use HasFactory;

    protected $fillable = ['amb_Denominacion','amb_Cupo'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_ambiente');
    }
}
