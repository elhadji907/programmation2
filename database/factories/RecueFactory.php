<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Recue::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uuid' => $faker->uuid,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
