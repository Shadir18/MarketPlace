<?php

namespace App\Enum;

enum PostAdsStatus : string
{
    case LISTED = 'listed';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case SOLDOUT = 'soldout';
}
