<?php

namespace App\Models;

use App\Enum\CategoryActiveStatus;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    protected function casts(): array
    {
        return [
            'is_active' =>CategoryActiveStatus::class,
        ];
    }
}
