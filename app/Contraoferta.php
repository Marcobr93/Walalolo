<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contraoferta extends Model
{
    protected $fillable = ['vendedor_user_id', 'comprador_user_id', 'producto_id', 'oferta', 'estado_oferta'];

    public function comprador()
    {
        return $this->belongsTo(User::class, "comprador_user_id");
    }

    public function vendedor(){
        return $this->belongsTo(User::class, "vendedor_user_id");
    }

}
