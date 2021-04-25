<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\CourriersHasImputation::class, function (Faker $faker) {
    return [
        'imputations_id' => function () {
            return factory(App\Imputation::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
