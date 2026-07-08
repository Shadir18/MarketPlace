<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleTypes = VehicleType::latest()->get();
        return view('vehicleTypes.index', compact('vehicleTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicleTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate ([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:vehicle_types,slug'],
            'is_active' => ['nullable', 'boolean']
        ]);
        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        } else {
            $validatedData['slug'] = Str::slug($validatedData['slug']);
        }

        DB::beginTransaction();
        try{
            $vehicleType = VehicleType::create($validatedData);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Vehicle type configuration saved successfully!',
                'redirect_url' => route('vehicleTypes.index')
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Database Constraint Exception: Could not persist type entry.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleType $vehicleType)
    {
        return view('vehicleTypes.show', compact('vehicleType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleType $vehicleType)
    {
        return view('vehicleTypes.edit', compact('vehicleType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleType $vehicleType)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:vehicle_types,slug,' . $vehicleType->id],
            'is_active' => ['nullable', 'boolean']
        ]);

        $validatedData['slug'] = Str::slug($validatedData['slug']);
        $validatedData['is_active'] = $request->input('is_active', 0) == 1;

        DB::beginTransaction();
        try {
            $vehicleType->update($validatedData);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Vehicle configuration properties successfully adjusted!',
                'redirect_url' => route('vehicleTypes.index')
            ], 200);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save context modification adjustments.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleType $vehicleType)
    {
        DB::beginTransaction();
        try {
            $vehicleType->delete();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Type parameter removed cleanly.'
            ], 200);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Removal constraints violated. Record could not be dropped.'
            ], 500);
        }
    }
}
