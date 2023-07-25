<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblFicha extends Model
{
    use HasFactory;

    public function evento(){
        //una ficha puede tener varios eventos
        return $this->hasMany(Evento::class,'Codigo');
    }
}
