<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $name = $faker->firstName;
    $apellido = $faker->lastName;
    $nombre_usuario = strtolower($name).'.'.strtolower($apellido);
    $email = str_slug($nombre_usuario).'@'.$faker->freeEmailDomain;

    return [
        'name' => $name,
        'apellido' => $apellido,
        'nombre_usuario' => $nombre_usuario,
        'slug' => str_slug($nombre_usuario),
        'email' => $email,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'avatar'      => 'https://picsum.photos/300/300/?image='.mt_rand(0,1000),
        'dni' => $faker->dni,
        'fecha_nac' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'num_telefono' => $faker->e164PhoneNumber,
        'direccion' => $faker->address,
        'poblacion' => $faker->country,
        'website' => $faker->url,
        'descripcion' => $faker->realText(255),
        'ip' => $faker->ipv4,
    ];
});
