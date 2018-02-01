<?php

use Faker\Generator as Faker;
use \Carbon\Carbon;

$factory->define(App\Producto::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'titulo'     => $faker->sentence(6,true),
        'foto'      => 'https://picsum.photos/300/300/?image='.mt_rand(0,1000),
        'descripcion' => $faker->realText(255),
        'direccion' => $faker->address,
        'poblacion' => $faker->country,
        'precio'    => $faker->randomFloat(2,0.01,10000),
        'categoria' => $faker->randomElement(['deportes_ocio' ,'muebles_deco_jardin', 'consolas_videojuegos',
            'libros_peliculas_musica','moda_accesorios','ninos_bebes','inmobiliaria','electrodomesticos',
            'servicios','otros']),
        'tipo_envio' => $faker->randomElement(['sin_envio' ,'5_kg_max', '10_kg_max','20_kg_max','30_kg_max']),
        'negociacion_precio' => $faker->numberBetween(0,1),
        'intercambio_producto' => $faker->numberBetween(0,1),
        'destacado' => $faker->numberBetween(0,1),
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
