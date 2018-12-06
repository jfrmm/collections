<?php

namespace Modules\Collection\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Entities\User;
use Modules\Collection\Entities\Collectible;
use Modules\Collection\Entities\Collection;

class CollectionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        // create 3 collections for each User
        foreach ($users as $user) {
            $user->collectionsOwned()->saveMany(factory(Collection::class, 3)->create(['creator_id' => $user->id])->each(function ($collection) use ($user) {
                $collection->collectibles()->saveMany(factory(Collectible::class, 5)->make(['creator_id' => $user->id, 'owner_id' => $user->id]));
            }));
        }
    }
}
