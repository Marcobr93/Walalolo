<?php

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

    return [
        'name' => $name = $faker->firstName,
        'apellido' => $apellido = $faker->lastName,
        'nombre_usuario' => strtolower($name).'.'.strtolower($apellido),
        'email' => strtolower($name).'.'.strtolower($apellido).'@'.$faker->freeEmailDomain,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'avatar' => 'http://lorempixel.com/450/300/',
        'dni' => $faker->dni,
        'num_telefono' => $faker->e164PhoneNumber,
        'direccion' => $faker->address,
        'poblacion' => $faker->country,
        'website' => $faker->url,
        'descripcion' => $faker->realText(255),
        'num_productos' => $faker->randomDigit,
    ];
});
