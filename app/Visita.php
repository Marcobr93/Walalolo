<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}
