<?php

use Faker\Generator as Faker;
use Modules\Collection\Entities\Collection;
use Modules\User\Entities\User;

$factory->define(Collection::class, function (Faker $faker) {

    // just get a random user to assign to a Collection
    $user = User::inRandomOrder()->first();

    return [
        'name' => $faker->word,
        'creator_id' => $user->id,
        'owner_id' => $user->id,
    ];
});
