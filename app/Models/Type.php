<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function effective()
    {
        return $this->belongsToMany(Type::class, 'type_weaknesses', 'type_id', 'effect_to')->where('effect_type', 'effective');
    }

    public function ineffective()
    {
        return $this->belongsToMany(Type::class, 'type_weaknesses', 'type_id', 'effect_to')->where('effect_type', 'ineffective');
    }

    public function no_effect()
    {
        return $this->belongsToMany(Type::class, 'type_weaknesses', 'type_id', 'effect_to')->where('effect_type', 'no_effect');
    }
}
