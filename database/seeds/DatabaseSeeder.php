<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Collection\Database\Seeders\CollectionDatabaseSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserDatabaseSeeder::class);
        $this->call(CollectionDatabaseSeeder::class);
    }
}
