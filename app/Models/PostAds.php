<?php

namespace App\Models;

use App\Enum\PostAdsStatus;
use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostAds extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'manufacture_year',
        'mileage',
        'price',
        'type_id',
        'model_id',
        'status',
        'category_id'
    ];

    protected function casts(): array
    {
        return [
            'status' => PostAdsStatus::class,
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(PostadsImage::class, 'post_ads_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type():BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function model():BelongsTo
    {
        return $this->belongsTo(ModelsModel::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
