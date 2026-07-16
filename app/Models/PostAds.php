<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostAds extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'brand_name',
        'model_name',
        'man_year',
        'mileage',
        'price'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
