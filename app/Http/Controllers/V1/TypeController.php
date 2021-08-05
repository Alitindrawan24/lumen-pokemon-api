<?php

namespace App\Http\Controllers\V1;

use Exception;
use App\Models\Type;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        try {
            $data = Type::with('effective', 'ineffective', 'no_effect')->get();

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

    public function show($id)
    {
        try {
            $data = Type::with('effective', 'ineffective', 'no_effect')->find($id);

            if ($data === null)
                throw new Exception('Type with ID ' . $id . ' not found');

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
