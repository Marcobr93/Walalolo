<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class); // con esto hemos conseguido que en la vista home, con {{ $producto->user->name }} podemos mostrar el autor del producto
    }

    public function getFotoAttribute($foto)
    {
        if( starts_with($foto, "default_product")){
            return $foto;
        } else if( starts_with($foto, "https://picsum")){
            return $foto;
        } else if( starts_with($foto, "/images/default")){
            return $foto;
        }
        return Storage::disk('public')->url($foto);
    }
}
