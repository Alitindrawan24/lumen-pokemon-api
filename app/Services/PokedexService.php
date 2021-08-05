<?php

namespace App\Services;

use App\Models\Type;
use App\Models\Pokedex;
use App\Helpers\TypeHelper;
use App\Http\Requests\PokedexRequest;

class PokedexService
{
    public function filterData(PokedexRequest $request)
    {
        $data = Pokedex::with('type_1', 'type_2');

        if (isset($request->name)) {
            $data = $data->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if (isset($request->type_1)) {
            if($request->type_1 != ''){
                $type = TypeHelper::explode($request->type_1);

                $data = $data->where(function ($query) use ($type) {
                    return $query->whereIn('type_1', $type)
                        ->orWhereIn('type_2', $type);
                });
            }
        }

        if (isset($request->type_2)) {
            if($request->type_2 != ''){
                $type = TypeHelper::explode($request->type_2);

                $data = $data->where(function ($query) use ($type) {
                    return $query->whereIn('type_1', $type)
                        ->orWhereIn('type_2', $type);
                });
            }
        }

        if (isset($request->order_by)) {
            $order = $request->order_type ?? 'ASC';
            $data->orderBy($request->order_by, $order);
        } else {
            $data = $data->orderBy('pokedex_number', 'ASC');
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
