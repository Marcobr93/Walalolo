<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    /** Cada visita se realiza en un producto.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}
