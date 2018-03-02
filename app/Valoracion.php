<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{

    protected $fillable = ['valora_user_id', 'valorado_user_id', 'valoracion'];

    /** Cada valoración la realiza un único usuario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'valora_user_id');
    }

}
