<?php

use Faker\Generator as Faker;
use Modules\Collection\Entities\Collectible;

$factory->define(Collectible::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
