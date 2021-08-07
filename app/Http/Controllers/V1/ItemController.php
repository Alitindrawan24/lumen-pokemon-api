<?php

namespace App\Http\Controllers\V1;

use Exception;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;

class ItemController extends Controller
{
    public function index(ItemRequest $request, ItemService $itemService)
    {
        try {
            $data = $itemService->filterData($request);

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
            $data = Item::find($id);

            if ($data === null)
                throw new Exception('Item with ID ' . $id . ' not found');

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