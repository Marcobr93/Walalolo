<?php

use Faker\Generator as Faker;
use \Carbon\Carbon;

$factory->define(App\Producto::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'nombre_usuario' => $faker->userName,
        'titulo'     => $faker->sentence(6,true),
        'foto'      => 'http://lorempixel.com/150/150/?\'.mt_rand(0,1000)',
        'descripcion'     => $faker->realText(255),
        'direccion' => $faker->address,
        'poblacion' => $faker->country,
        'precio'    => $faker->randomFloat(null,0,null),
        'categoria' => $faker->word,
        'tipo_envio' => $faker->word,
        'negociacion_precio' => $faker->randomDigit,
        'intercambio_producto' => $faker->randomDigit,
        'destacado' => $faker->randomDigit,
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
