<?php
namespace App\Services;

use App\Models\Item;
use App\Http\Requests\ItemRequest;

class ItemService
{
    public function filterData(ItemRequest $request)
    {
        $data = Item::query();

        if (isset($request->name)) {
            $data = $data->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if (isset($request->offset)) {
            $data = $data->offset($request->offset);
        }

        if (isset($request->limit)) {
            $data = $data->limit($request->limit);
        }

        $data = $data->get();

        return $data;
    }
}