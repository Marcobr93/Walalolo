<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /** Muchas usuarios tienen muchas conversaciones.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /** Un usuario puede enviar muchos mensajes privados.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function privateMessages()
    {
        return $this->hasMany(PrivateMessage::class)->latest();
    }

    /** La conversación se realiza entre dos usuarios.
     * @param User $user
     * @param User $other
     * @return mixed
     */
    public static function between(User $user, User $other)
    {
        $query = Conversation::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('users', function ($query) use ($other) {
            $query->where('user_id', $other->id);
        });

        $conversation = $query->firstOrCreate([]);

        $conversation->users()->sync([$user->id, $other->id]);

        return $conversation;
    }
}
