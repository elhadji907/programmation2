<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Bordereau::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'numero_mandat' => $faker->randomNumber(),
        'date_mandat' => $faker->dateTime(),
        'designation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'nombre_de_piece' => $faker->randomNumber(),
        'observation' => $faker->text,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
