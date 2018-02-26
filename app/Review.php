<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'review_user_id', 'comentario'];

    /** Una review tiene un usuario que la realiza.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users()
    {
        return $this->hasOne(User::class, 'review_user_id');
    }
}
