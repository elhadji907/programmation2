<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Quartier::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'chef_id' => $faker->randomNumber(),
        'villes_id' => function () {
            return factory(App\Ville::class)->create()->id;
        },
        'villages_id' => function () {
            return factory(App\Village::class)->create()->id;
        },
    ];
});
