<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Pokedex extends Model
{
    protected $table = 'pokedex';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function type_1()
    {
        return $this->belongsTo(Type::class, 'type_1');
    }
    
    public function type_2()
    {
        return $this->belongsTo(Type::class, 'type_2');
    }
}
