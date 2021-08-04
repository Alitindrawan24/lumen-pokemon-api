<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypeSeeder::class,
            TypeWeaknessSeeder::class,
            ItemSeeder::class,
            MoveSeeder::class,
            PokedexSeeder::class,
        ]);
    }
}
