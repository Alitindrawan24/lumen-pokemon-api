<?php
namespace App\Services;

use App\Models\Move;
use App\Helpers\TypeHelper;
use App\Http\Requests\MoveRequest;

class MoveService
{
    public function filterData(MoveRequest $request)
    {
        $data = Move::with('type');

        if (isset($request->name)) {
            $data = $data->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if (isset($request->type)) {
            if($request->type != ''){
                $type = TypeHelper::explode($request->type);
                $data = $data->whereIn('type_id', $type);
            }
        }

        
        if (isset($request->order_by)) {
            $order = $request->order_type ?? 'ASC';
            $data->orderBy($request->order_by, $order);
        } else {
            $data = $data->orderBy('id', 'ASC');
        }
        
        if (isset($request->category)) {
            if($request->category != ''){
                $data = $data->where('category', $request->category);
            }
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