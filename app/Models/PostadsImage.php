<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostadsImage extends Model
{
    // protected $table = 'postads_images';

    protected $fillable = [
        'post_ads_id',
        'postads_img',
    ];

    public function postAd()
    {
        return $this->belongsTo(PostAds::class, 'post_ads_id');
    }
}
