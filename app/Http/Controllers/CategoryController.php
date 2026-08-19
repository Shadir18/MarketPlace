<?php

namespace App\Http\Controllers;

use App\Enum\CategoryActiveStatus;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::latest()->get();
        if ($request->wantsJson()){
            return response()->json($categories);
        }
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'is_active' => ["required", new Enum(CategoryActiveStatus::class)],
        ]);
        try{
            DB::beginTransaction();
            $category = Category::create($attributes);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'successfully created',
                'data' => $category
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'failed to create try again later'
            ], 500);
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category  = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
       $category  = Category::findOrFail($id);
       return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $attributes = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'is_active' => ["required", new Enum(CategoryActiveStatus::class)],
        ]);
        try{
            DB::beginTransaction();
            $category = Category::findOrFail($id);
            $category->update($attributes);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'successfully updated',
                'data' => $category
            ], 201);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();
            $category = Category::findOrFail($id);
            $category->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'record deleted'
            ], 200);
        } catch (\Throwable $th){
            DB::rollBack();
            return response()->json([
                'success' => true,
                'message' => 'record failed to delete, please try again later'
            ], 500);
        }
    }
}
