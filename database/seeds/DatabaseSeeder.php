<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Database\Seeders\AuthDatabaseSeeder;
use Modules\Collection\Database\Seeders\CollectionDatabaseSeeder;

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

        $this->call(AuthDatabaseSeeder::class);
        $this->call(CollectionDatabaseSeeder::class);
    }
}
