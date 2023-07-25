<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblInstructor extends Model
{
    use HasFactory;

    protected $fillable = ['inst_Identificacion','inst_TipoID','inst_Nombres','inst_Apellido','inst_Direccion','inst_Correo','inst_Telefono'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_instructor');
    }
}
