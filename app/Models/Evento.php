<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
<<<<<<< HEAD
    protected $table = 'tbl_eventos';
=======
    // protected $table = 'tbl_eventos';

>>>>>>> f564cca56d1afe08c260923aab4363cc1c9ad431
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'start' => 'required',
        'end' => 'required',
    ];

<<<<<<< HEAD
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
=======
    protected $fillable = ['title','descripcion','color', 'start','end'];


    //
    public function instructor(){        
        return $this->belongsTo(TblInstructores::class,'Codigo_instructor'); 
    }

    public function ambiente(){        
        return $this->belongsTo(TblAmbientes::class,'Codigo_ambiente'); 
    }

    public function ficha(){        
        return $this->belongsTo(TblFicha::class,'Codigo_ficha'); 
    }

    public function resultadoApre(){        
        return $this->belongsTo(TblResultadoApre::class,'Codigo_resultado_aprendizaje'); 
>>>>>>> f564cca56d1afe08c260923aab4363cc1c9ad431
    }
}
