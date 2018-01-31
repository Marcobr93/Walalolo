<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nombre_usuario', 'apellido', 'avatar', 'dni', 'num_telefono', 'direccion', 'poblacion', 'website',
        'descripcion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function profile(){
        return $this->hasOne(User::class);
    }
}
