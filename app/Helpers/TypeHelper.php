<?php

namespace App\Helpers;

use App\Models\Type;

class TypeHelper
{

    public static function explode($type)
    {
        $type_array = Type::get()->pluck('id', 'name')->toArray();
        $type = explode('|', $type);
        $type = array_unique($type);
        $type = array_map(function ($item) {
            return ucfirst(strtolower($item));
        }, $type);

        foreach ($type as $key => $value) {
            $type[$key] = $type_array[$value];
        }

        return $type;
    }
}
