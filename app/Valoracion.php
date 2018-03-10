<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];


    /** Cada valoración la realiza un único usuario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'valora_user_id');
    }

    /** Usuario valorado
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userValorado()
    {
        return $this->belongsTo(User::class,'valorado_user_id');
    }

}
