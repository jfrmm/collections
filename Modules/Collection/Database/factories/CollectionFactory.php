<?php

use Faker\Generator as Faker;
use Modules\Collection\Entities\Collection;

$factory->define(Collection::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
