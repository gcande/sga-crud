<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblInstructor extends Model
{ 
    use HasFactory;
    protected $primaryKey = 'Codigo';

    protected $fillable = ['inst_Identificacion','inst_TipoID','inst_Nombres','inst_Apellido','inst_Direccion','inst_Correo','inst_Telefono', 'Codigo_vigencia'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_instructor'); 
    }

    //N a 1
    public function vigencia() {
        return $this->belongsTo(TblVigencia::class, 'Codigo_vigencia');
    }
}
