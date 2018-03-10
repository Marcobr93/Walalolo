<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{

    /** Muchos usuarios tienen muchas conversaciones.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    /** Función que nos devuelve el usuario con el que el usuario logeado ha tenido una conversación.
     * @param $conversation
     * @return mixed
     */
    public static function user($conversation)
    {
        $users = $conversation->users()->get();

        foreach ($users as $user){
            if($user->id !== Auth::user()->id){
                return $user;
            }
        }
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


    /** Función que sólo nos mostrará las conversaciones del usuario.
     * @param User $user
     * @param User $other
     * @return mixed
     */
    public static function conversationId(User $user, User $other)
    {
        $query = Conversation::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('users', function ($query) use ($other) {
            $query->where('user_id', $other->id);
        });

        return $query->first();
    }


    /** Función que comprobará si la conversación contiene el usuario.
     * @param $user
     * @param $conversation
     * @return mixed
     */
    public static function userInConversation($user, $conversation){

        return $conversation->users()->get()->contains($user);
    }


}
