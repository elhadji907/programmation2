<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Individuelle::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'cin' => $faker->word,
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
    ];
});
