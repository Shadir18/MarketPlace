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

    public function store(array $attributes, Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create($attributes);
            Seller::create([
                'user_id' => $user->id,
                'name' => $user->first_name,
            ]);
            $user->syncRoles($request->roles);
            DB::commit();
            if (! Auth::check()){
                Auth::login($user);
            }
            return response()->json([
                'message' => 'Your account has been created successfully!',
                'user' => $user
            ], 201);
        } catch (\Throwable $th) {
    DB::rollBack();

    return response()->json([
        'message' => $th->getMessage(),
        'line' => $th->getLine(),
    ], 500);
}
    }
}