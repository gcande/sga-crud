<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    // protected $table = 'tbl_eventos';

    use HasFactory;

    static $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'start' => 'required',
        'end' => 'required',
    ];

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
    }
}
