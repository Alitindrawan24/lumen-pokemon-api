<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MoveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            $moves = File::get('database/json/moves.json');
            $moves = json_decode($moves, true);
            $now = Carbon::now();
            $types_data = Type::get()->pluck('id','name')->toArray();

            foreach ($moves as $move ) {
                
                DB::table('moves')->insert([
                    'name' => $move['ename'],
                    'category' => $move['category'],
                    'accuracy' => $move['accuracy'],
                    'power' => $move['power'],
                    'pp' => $move['pp'],
                    'type_id' => $types_data[$move['type']],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);

            }
        });
    }
}
