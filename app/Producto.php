<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class); // con esto hemos conseguido que en la vista home, con {{ $producto->user->name }} podemos mostrar el autor del producto
    }
}
