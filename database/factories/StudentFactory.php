<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Student::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'filiacao' => $faker->name,
        'matricula' => 0000,
        'dt_nasc' => $faker->date(),
        'natural' => $faker->name(),
        'cpf' => 234566543,
        'rg' => 3456543,
    ];
});
