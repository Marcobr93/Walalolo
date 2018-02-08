<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nombre_usuario', 'slug','apellido', 'avatar', 'dni', 'num_telefono', 'direccion', 'poblacion', 'website',
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


    /** Un usuario tiene muchos productos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }


    /** Un usuario tiene un perfil
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(User::class);
    }


    /** Un usuario recibe muchas ofertas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contraofertas()
    {
        return $this->hasMany(Contraoferta::class, 'vendedor_user_id');
    }


    /** Un usuario realiza muchas ofertas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contraofertasRealizadas()
    {
        return $this->hasMany(Contraoferta::class, 'comprador_user_id');
    }



    /** Un usuario tiene muchas valoraciones
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class, 'valorado_user_id');
    }


    /** Un usuario tiene muchas reviews de otros usuarios
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

}
