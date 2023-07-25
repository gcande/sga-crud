<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'tbl_eventos';
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'start' => 'required',
        'end' => 'required',
    ];

    protected $fillable = ['title','descripcion','color', 'start','end','horaInicio','horaFinal'];

    public function resultadoAprendizaje()
    {
        return $this->belongsTo(tblResultadoAprendizaje::class, 'Codigo_resultado_aprendizaje');
    }

    public function instructor()
    {
        return $this->belongsTo(tblInstructor::class, 'Codigo_instructor');
    }

    public function fichaCaracterizacion()
    {
        return $this->belongsTo(tblFichaCaracterizacion::class, 'Codigo_ficha');
    }

    public function ambiente()
    {
        return $this->belongsTo(tblAmbiente::class, 'Codigo_ambiente');
    }
}
