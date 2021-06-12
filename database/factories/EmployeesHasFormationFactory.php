<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EmployeesHasFormation::class, function (Faker $faker) {
    return [
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
