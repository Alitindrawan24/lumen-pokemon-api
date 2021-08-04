<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TypeWeaknessSeeder extends Seeder
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
            $types_data = Type::get()->pluck('id','name')->toArray();
            $enum_const = ['effective', 'ineffective','no_effect'];

            foreach ($types as $type ) {

                foreach($enum_const as $const){
                
                    foreach ($type[$const] as $value) {
                        DB::table('type_weaknesses')->insert([
                            'type_id' => $types_data[$type['ename']],
                            'effect_type' => $const,
                            'effect_to' => $types_data[$value],
                            'created_at' => $now,
                            'updated_at' => $now
                        ]);
                    }
                }

            }
        });
    }
}
