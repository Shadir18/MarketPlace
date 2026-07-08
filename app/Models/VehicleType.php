<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VehicleType extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($type) {
            if (empty($type->slug)) {
                $type->slug = Str::slug($type->name);
            }
        });
    }
}
