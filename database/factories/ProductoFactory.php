<?php

use Faker\Generator as Faker;
use \Carbon\Carbon;

$factory->define(App\Producto::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'titulo' => $faker->sentence(6, true),
        'foto' => 'https://picsum.photos/300/300/?image=' . mt_rand(0, 1000),
        'descripcion' => $faker->realText(255),
        'precio' => $faker->randomFloat(2, 0.01, 10000),
        'categoria' => $faker->randomElement(['Coches', 'Motor y Accesorios', 'Electrónica', 'Deporte y Ocio', 'Muebles, Deco y jardín', 'Consolas y Videojuegos',
            'Libros, películas y música', 'Moda y Accesorios', 'Niños y bebés', 'Inmobiliaria', 'Electrodomésticos',
            'Servicios', 'Otros']),
        'tipo_envio' => $faker->randomElement(['Sin envío', '5 kg max', '10 kg max', '20 kg max', '30 kg max']),
        'negociacion_precio' => $faker->numberBetween(0, 1),
        'intercambio_producto' => $faker->numberBetween(0, 1),
        'destacado' => $faker->numberBetween(0, 1),
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
