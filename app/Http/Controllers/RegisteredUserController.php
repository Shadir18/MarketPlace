<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\Seller;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function createUser (Request $request): User
    {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);
        $attributes['password'] = Hash::make($attributes['password']);
        return User::create($attributes);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->createUser($request);
            Seller::create([
                'user_id' => $user->id,
                'name' => $user->first_name,
            ]);
            DB::commit();
            Auth::login($user);
            return response()->json([
                'message' => 'Your account has been created successfully!',
                'user' => $user
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
            'message' => 'Registration failed',
        ], 500);
        }
    }
}