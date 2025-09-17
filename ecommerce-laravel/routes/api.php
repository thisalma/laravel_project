<?php

use App\Http\Controllers\Api\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::post('/mobile/register', function(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // issue Sanctum token
    $token = $user->createToken('mobile-token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token
    ]);
});


