<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPrograma extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['prog_Denominacion','prog_Version','prog_Estado','prog_HorasEstimadas','prog_Creditos','prog_Descripcion','prog_DuracionMeses'];
}
