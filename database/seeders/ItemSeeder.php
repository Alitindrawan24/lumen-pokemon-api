<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            $items = File::get('database/json/items.json');
            $items = json_decode($items, true);
            $now = Carbon::now();

            foreach ($items as $item ) {
                
                DB::table('items')->insert([
                    'name' => $item['name']['english'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);

            }
        });
    }
}
