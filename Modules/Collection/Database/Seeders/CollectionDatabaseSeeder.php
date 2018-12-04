<?php

namespace Modules\Collection\Database\Seeders;

use Illuminate\Database\Seeder;
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
        factory(Collection::class, 3)->create();
    }
}
