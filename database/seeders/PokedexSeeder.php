<?php

namespace Database\Seeders;

use App\Models\Type;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PokedexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            $pokedex = File::get('database/json/pokedex.json');
            $pokedex = json_decode($pokedex, true);
            $now = Carbon::now();
            $types_data = Type::get()->pluck('id','name')->toArray();

            foreach ($pokedex as $pokemon ) {
                
                DB::table('pokedex')->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'pokedex_number' => $pokemon['id'],
                    'name' => $pokemon['name']['english'],
                    'type_1' => $types_data[$pokemon['type'][0]],
                    'type_2' => isset($pokemon['type'][1]) ? $types_data[$pokemon['type'][1]] : null,
                    'hp' => $pokemon['base']['HP'],
                    'attack' => $pokemon['base']['Attack'],
                    'defense' => $pokemon['base']['Defense'],
                    'special_attack' => $pokemon['base']['Sp. Attack'],
                    'special_defense' => $pokemon['base']['Sp. Defense'],
                    'speed' => $pokemon['base']['Speed'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);

            }
        });
    }
}
