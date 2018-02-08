<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    //protected $table = 'valoraciones';

    protected $fillable = ['valora_user_id', 'valorado_user_id','valoracion'];



    public function usuarios(){
        return $this->belongsTo(User::class, 'valora_user_id');
    }

}
