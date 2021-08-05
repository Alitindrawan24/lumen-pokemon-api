<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
