<?php

use Faker\Generator as Faker;
use \Carbon\Carbon;

$factory->define(\App\Contraoferta::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'oferta' =>   $faker->randomFloat(2,0.01,5000),
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2,
        'estado_oferta' => "En proceso"
    ];
});
