<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::with('roles')->latest()->get();
        $roles = Role::all();
        if ($request->wantsJson()){
            return response()->json($users);
        }
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RegisteredUserController $registeredUserController)
    {
        
        try {
            $attributes = $request->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', Password::min(6), 'confirmed'],
                'roles' => 'required'
            ]);
            return $registeredUserController->store($attributes, $request->input('roles', []));
        } catch (\Throwable) {
            return response()->json([
            'message' => 'Registration failed',
        ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users  = User::findOrFail($id);
        return response()->json($users);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users  = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, User $users)
    {
        Gate::authorize('update', $users);
        $attributes = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'current_password' => ['nullable', 'current_password'],
            'password' => ['nullable', 'confirmed'],
        ]);
        unset($attributes['current_password']);
        if (!empty($attributes['password'])){
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        try {
            Gate::authorize('update', $users);
            DB::beginTransaction();
            $users = User::findOrFail($id);
            $users->syncRoles($request->roles);
            $users->password = Hash::make($request->password);
            $users->update($attributes);
            DB::commit();
            return response()->json([
                'message' => 'Your account has been created successfully!',
                'user' => $users
            ], 201);
        } catch (\Throwable) {
            DB::rollBack();
            return response()->json([
            'message' => 'update failed',
        ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, User $users)
    {
        Gate::authorize('delete', $users);
        try{
            DB::beginTransaction();
            $users = User::findOrFail($id);
            $users->delete();
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
