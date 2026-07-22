<?php

namespace App\Http\Controllers;

use App\Models\PostAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postAds = PostAds::with(['user'])->latest()->where('status', 0)->get();
        return view('post_ads.listed.index', compact('postAds'));
    }

    //approved ads page
    public function approvedIndex()
    {
        $postAds = PostAds::with(['user'])->latest()->where('status', 1)->get();
        return view('post_ads.approved.index', compact('postAds'));
    }

    public function approve(string $id)
    {
        try{
            DB::beginTransaction();
            $postAds = PostAds::findOrFail($id);
            $postAds->update(['status' => 1]);
            DB::commit();
            return response()->json([
                'success' => 1,
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
    public function rejectedIndex()
    {
        $postAds = PostAds::with(['user'])->latest()->where('status', 2)->get();
        return view('post_ads.rejected.index', compact('postAds'));
    }

    public function reject(string $id)
    {
        try{
            DB::beginTransaction();
            $postAds = PostAds::findOrFail($id);
            $postAds->update(['status' => 2]);
            DB::commit();
            return response()->json([
                'success' => 2,
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
        return view ('post_ads.create');
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
            'type_id'      => 'required|exists:types,id',
            'model_id'     => 'required|exists:models,id',
            'category_id'  => 'required|exists:categories,id',
        ]);
        try{
            DB::beginTransaction();
            $attributes['user_id'] = Auth::id();
            $postAd = PostAds::create($attributes);
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
                'message' => 'Failed to create product'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
