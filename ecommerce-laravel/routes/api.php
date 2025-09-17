<?php

use App\Http\Controllers\Api\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Register
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

    $token = $user->createToken('mobile-token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token
    ], 201);
});

// Login
Route::post('/mobile/login', function(Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('mobile-token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token
    ]);
});

// Protected route
Route::middleware('auth:sanctum')->get('/mobile/me', function (Request $request) {
    return $request->user();
});


