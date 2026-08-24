<?php

namespace App\Http\Controllers;

use App\Enum\PostAdsStatus;
use App\Models\Category;
use App\Models\Model;
use App\Models\PostAds;
use App\Models\PostadsImage;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $postAds = PostAds::with(['user', 'category', 'type', 'model'])->latest()->where(['status' => PostAdsStatus::LISTED])->get();
        $categories = Category::all();
        $models = Model::all();
        $types = Type::all();
        if ($request->wantsJson()){
            return response()->json([
                'postAds' => $postAds,
                'categories' => $categories,
                'models' => $models,
                'types' => $types,
            ]);
        }
        return view('post_ads.listed.index', compact('postAds', 'categories', 'models', 'types'));
    }

    //approved ads page
    public function approvedIndex(Request $request)
    {
        $postAds = PostAds::with(['user', 'category', 'type', 'model'])->latest()->whereIn('status', [PostAdsStatus::APPROVED, PostAdsStatus::SOLDOUT])->get();
        $categories = Category::all();
        $models = Model::all();
        $types = Type::all();
        if ($request->wantsJson()){
            return response()->json([
                'aaData' => $postAds,
                'categories' => $categories,
                'models' => $models,
                'types' => $types,
            ]);
        }
        return view('post_ads.approved.index', compact('postAds', 'categories', 'models', 'types'));
    }

    public function approve(string $id)
    {
        try{
            DB::beginTransaction();
            $postAds = PostAds::findOrFail($id);
            $postAds->update(['status' => PostAdsStatus::APPROVED]);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Post Ad approved successfully!',
                'data' => $postAds
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to approve post ad.'
            ], 500);
        }
    }
    //rejected index page
    public function rejectedIndex(Request $request)
    {
        $postAds = PostAds::with(['user', 'category', 'type', 'model'])->latest()->where(['status' => PostAdsStatus::REJECTED])->get();
        $categories = Category::all();
        $models = Model::all();
        $types = Type::all();
        if ($request->wantsJson()){
            return response()->json([
                'postAds' => $postAds,
                'categories' => $categories,
                'models' => $models,
                'types' => $types,
            ]);
        }
        return view('post_ads.rejected.index', compact('postAds', 'categories', 'models', 'types'));
    }

    public function reject(string $id)
    {
        try{
            DB::beginTransaction();
            $postAds = PostAds::findOrFail($id);
            $postAds->update(['status' => PostAdsStatus::REJECTED]);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Post Ad approved successfully!',
                'data' => $postAds
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to approve post ad.'
            ], 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $models = Model::all();
        $types = Type::all();
        return view ('post_ads.create', compact('categories', 'models', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'        => 'required',
            'manufacture_year'     => 'required',
            'mileage'      => 'required',
            'price'        => 'required',
            'postads_img'  => 'required|array',
            'postads_img.*'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'type_id'      => 'required|exists:types,id',
            'model_id'     => 'required|exists:models,id',
            'category_id'  => 'required|exists:categories,id',
        ]);
        try{
            DB::beginTransaction();
            $attributes['user_id'] = Auth::id();
            $postAd = PostAds::create($attributes);
            if($request->hasFile('postads_img')){
                foreach ($request->file('postads_img')as $postads_img){
                    $path = $postads_img->store('postads_images', 'public');
                    PostadsImage::create([
                        'post_ads_id' => $postAd->id,
                        'postads_img' => $path,
                    ]);
                }
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'successfully created',
                'data' => $postAd
            ], 201);
        } catch (\Throwable $th){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ], 500);
        }
    }

    public function sold(string $id)
    {
        try{
            DB::beginTransaction();
            $postAds = PostAds::findOrFail($id);
            $postAds->update(['status' => PostAdsStatus::SOLDOUT]);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Post Ad solded!',
                'data' => $postAds
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postAds = PostAds::findOrFail($id);
        return response()->json($postAds);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributes = $request->validate([
            'title'        => 'required',
            'manufacture_year'     => 'required',
            'mileage'      => 'required',
            'price'        => 'required',
            'postads_img'  => 'array',
            'postads_img.*'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'type_id'      => 'required|exists:types,id',
            'model_id'     => 'required|exists:models,id',
            'category_id'  => 'required|exists:categories,id',
        ]);
        try{
            DB::beginTransaction();
            $postAd = PostAds::findOrFail($id);
            $postAd->update($attributes);
            if($request->hasFile('postads_img')){
                foreach ($request->file('postads_img')as $postads_img){
                    $path = $postads_img->create('postads_images', 'public');
                    PostadsImage::update([
                        'post_ads_id' => $postAd->id,
                        'postads_img' => $path,
                    ]);
                }
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'successfully updated',
                'data' => $postAd
            ], 200);
        } catch (\Throwable $th){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
