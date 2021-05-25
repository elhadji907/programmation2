<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Demandeur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'sexe' => $faker->word,
        'situation_professionnelle' => $faker->word,
        'etablissement' => $faker->word,
        'niveau_etude' => $faker->word,
        'diplome' => $faker->word,
        'qualification' => $faker->text,
        'experience' => $faker->text,
        'deja_forme' => $faker->word,
        'pre_requis' => $faker->text,
        'adresse' => $faker->text,
        'type' => $faker->word,
        'projet' => $faker->text,
        'situation' => $faker->word,
        'telephone' => $faker->word,
        'fixe' => $faker->word,
        'items1' => $faker->word,
        'items2' => $faker->word,
        'items3' => $faker->word,
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'lieux_id' => function () {
            return factory(App\Lieux::class)->create()->id;
        },
        'items_id' => function () {
            return factory(App\Item::class)->create()->id;
        },
    ];
});
