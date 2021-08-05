<?php

namespace App\Http\Controllers\V1;

use Exception;
use App\Models\Move;
use App\Http\Controllers\Controller;

class MoveController extends Controller
{
    public function index()
    {
        try {
            $data = Move::with('type')->get();

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
            $data = Move::with('type')->find($id);

            if ($data === null)
                throw new Exception('Move with ID ' . $id . ' not found');

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