<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            $types = File::get('database/json/types.json');
            $types = json_decode($types, true);
            $now = Carbon::now();

            foreach ($types as $type ) {
                
                DB::table('types')->insert([
                    'name' => $type['ename'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);

            }
        });
    }
}
