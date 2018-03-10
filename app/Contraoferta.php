<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contraoferta extends Model
{
    protected $fillable = ['vendedor_user_id', 'comprador_user_id', 'producto_id', 'oferta', 'estado_oferta'];


    /** Cada contraoferta es realizada por un comprador.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comprador()
    {
        return $this->belongsTo(User::class, "comprador_user_id");
    }


    /** Cada contraoferta tiene un sólo vendedor.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendedor()
    {
        return $this->belongsTo(User::class, "vendedor_user_id");
    }


    /** Cada contraoferta se realiza sobre un único producto.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, "producto_id");

    }

}
