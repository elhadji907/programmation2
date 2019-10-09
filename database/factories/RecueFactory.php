<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\Recue::class, function (Faker $faker) {
//     return [
//         'uuid' => $faker->uuid,
//         'objet' => $faker->word,
//         'courriers_id' => function () {
//             return factory(App\Courrier::class)->create()->id;
//         },
//     ];
// });


use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$gestionnaire_id = App\Role::where('name','Gestionnaire')->first()->id;

$factory->define(App\Recue::class, function (Faker\Generator $faker) {
    return [
        'objet' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
