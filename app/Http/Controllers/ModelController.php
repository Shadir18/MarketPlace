<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Model::latest()->get();
        return view('models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'is_active' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $model = Model::create($attributes);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'successfully created',
                'data' => $model
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
        $model = Model::findOrFail($id);
        return view('models.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Model::findOrFail($id);
        return view('models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'is_active' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $model = Model::findOrFail($id);
            $model->update($attributes);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'successfully updated',
                'data' => $model
            ], 201);
        } catch (\Throwable $th){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product'
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
            $model = Model::findOrFail($id);
            $model->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'delete success',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Delete operation failed, please try again',
            ], 500);
        }
    }
}
