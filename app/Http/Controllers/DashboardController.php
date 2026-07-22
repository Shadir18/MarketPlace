<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Model;
use App\Models\PostAds;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalAds' => PostAds::count(),
            'listedAds' => PostAds::where('status', 0)->count(),
            'approvedAds' => PostAds::where('status', 1)->count(),
            'rejectedAds' => PostAds::where('status', 2)->count(),
            'recentlistedAds' => PostAds::where('status', 0)->latest()->take(5)->get(),
            'recentApprovedAds' => PostAds::where('status', 1)->latest()->take(5)->get(),
            'totalUsers' => User::count(),
            'totalCategories' => Category::count(),
            'totalModels' => Model::count(),
        ]);
    }
}