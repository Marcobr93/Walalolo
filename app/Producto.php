<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /** Un producto es de un único usuario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class); // con esto hemos conseguido que en la vista home, con {{ $producto->user->name }} podemos mostrar el autor del producto
    }

    /** Getter de la foto del producto, para mostrar si la foto proviene de una por defecto o de una generada con $faker
     * @param $foto
     * @return mixed
     */
    public function getFotoAttribute($foto)
    {
        if (starts_with($foto, "default_product")) {
            return $foto;
        } else if (starts_with($foto, "https://picsum")) {
            return $foto;
        } else if (starts_with($foto, "/images/default")) {
            return $foto;
        }
        return Storage::disk('public')->url($foto);
    }
}
