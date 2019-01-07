<?php

use Faker\Generator as Faker;

$factory->define(App\Despesa::class, function (Faker $faker) {
    return [
        'data' => $faker->dateTimeBetween('-3 years'),
        'descricao' => $faker->realText(),
        'valor' => $faker->randomFloat(2, 0, 1000),
    ];
});
