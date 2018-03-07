<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    use SoftDeletes;


    protected $guarded = ['id', 'created_at', 'updated_at'];

    /** Un usuario puede tener muchos productos.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class); // con esto hemos conseguido que en la vista home, con {{ $producto->user->name }} podemos mostrar el autor del producto
    }


    /** Un producto puede tener muchas contraofertas
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contraofertasProducto(){
        return $this->belongsToMany(Contraoferta::class, 'producto_id');
    }


    /** Los productos tienen muchas visitas.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitas() {
        return $this->hasMany(Visita::class);
    }


    /** Contabiliza las visitas.
     * @return int
     */
    public function getVisitasCount(){
        return $this->visitas()->count();
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
