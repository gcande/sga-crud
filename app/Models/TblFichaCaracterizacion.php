<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TblFichaCaracterizacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'Codigo';

    protected $fillable = ['fich_Codigo','fich_Inicio','fich_Fin','fich_Etapa','Codigo_programa','Codigo_modalidad', 'Codigo_centro'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_ficha');
    }

    public function programa():BelongsTo {
        return $this->belongsTo(TblPrograma::class, 'Codigo_programa');
    }

    public function modalidad():BelongsTo {
        return $this->belongsTo(TblModalidad::class, 'Codigo_modalidad');
    }

    public function centro() {
        return $this->belongsTo(TblCentro::class,'Codigo_centro');
    }
}
