<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblInstructores extends Model
{
    use HasFactory;

    public function evento(){
        //un instructor puede tener varios eventos
        return $this->hasMany(Evento::class,'Codigo');
    }
}
