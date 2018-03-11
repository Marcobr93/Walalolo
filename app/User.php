<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nombre_usuario', 'slug', 'apellido', 'avatar', 'dni', 'fecha_nac', 'num_telefono', 'direccion', 'poblacion', 'website',
        'descripcion', 'ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /** Un usuario tiene muchos productos.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }


    /** Un usuario tiene un perfil.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(User::class);
    }


    /** Un usuario recibe muchas ofertas.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contraofertas()
    {
        return $this->hasMany(Contraoferta::class, 'vendedor_user_id')->where('estado_oferta', "En proceso");
    }

    /** Ofertas aceptadas por el usuario.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contraofertasAceptadas()
    {
        return $this->hasMany(Contraoferta::class, 'vendedor_user_id')->where('estado_oferta', "Aceptada");
    }


    /** Un usuario realiza muchas ofertas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contraofertasRealizadas()
    {
        return $this->hasMany(Contraoferta::class, 'comprador_user_id');
    }


    /** Un usuario puede realizar muchas valoraciones
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valorar()
    {
        return $this->hasMany(Valoracion::class, 'valora_user_id');
    }


    /** Un usuario tiene muchas valoraciones
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class, 'valorado_user_id');
    }


    /** Calcula la valoración media de un usuario
     * @return int|string
     */
    public function valoracionMedia()
    {
        $valoraciones = $this->valoraciones->pluck('valoracion')->toArray();

        $sumaValoraciones = array_sum($valoraciones);

        if ($this->valoraciones->count() > 0) {
            $count = $this->valoraciones->count();
        } else {
            $count = 0;
        }

        if ($count === 0) {
            $media = 0;
        } else {
            $media = number_format($sumaValoraciones / $count, '2');
        }

        return $media;
    }


    /** Un usuario tiene muchas reviews de otros usuarios
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }


    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }


    /** Función para saber si el usuario logeado es el mismo que el que comprobamos
     * @param $user
     * @return bool
     */
    public static function soyYo($user)
    {
        if (Auth::user()->id == $user->id) {
            return true;
        } else {
            return false;
        }
    }


    /** Getter del avatar del usuario, para mostrar si el avatar proviene de una por defecto o de una generada con $faker
     * @param $avatar
     * @return mixed
     */
    public function getAvatarAttribute($avatar)
    {
        if (starts_with($avatar, "userXDefecto")) {
            return $avatar;
        } else if (starts_with($avatar, "https://picsum")) {
            return $avatar;
        } else if (starts_with($avatar, "/images/userXDefecto")) {
            return $avatar;
        }
        return Storage::disk('public')->url($avatar);
    }

}
