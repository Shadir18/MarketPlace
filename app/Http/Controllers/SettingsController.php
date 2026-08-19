<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $setting = Setting::findOrFail($id);
        return response()->json($setting);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $attributes = $request->validate([
            'application_name' => 'required',
            'name' => 'nullable',
            'currency' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'contacting_hours' => 'nullable'
        ]);
        try{
            DB::beginTransaction();
            $setting = Setting::firstOrCreate(['id' => 1]);
            $setting->update($attributes);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Settings updated successfully!',
                'data'    => $setting,
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
