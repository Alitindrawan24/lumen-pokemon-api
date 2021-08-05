<?php

namespace App\Http\Controllers\V1;

use App\Models\Pokedex;
use App\Http\Controllers\Controller;
use App\Http\Requests\PokedexRequest;
use App\Services\PokedexService;
use Exception;

class PokedexController extends Controller
{


    public function index(PokedexRequest $request, PokedexService $pokedexService)
    {
        try {
            $data = $pokedexService->filterData($request);

            return response()->json([
                'status' => true,
                'count' => count($data),
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function show($pokedex_number)
    {
        try {
            $data = Pokedex::with('type_1', 'type_2')->where('pokedex_number', $pokedex_number)->first();

            if ($data === null)
                throw new Exception('Pokemon with pokedex number ' . $pokedex_number . ' not found');

            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }
}
