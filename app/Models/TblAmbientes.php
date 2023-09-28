<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblAmbientes extends Model
{
    use HasFactory;

    public function evento(){
        //un ambiente puede tener varios eventos
        return $this->hasMany(Evento::class,'Codigo');
    }
}
