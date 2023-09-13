<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $token = $user->createToken('finwaveToken')->plainTextToken;

        return response()->json([
            'message' => 'Registered successfully',
            'token_type' => 'Bearer',
            'token' => $token,
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Bad credentials, Try Again',
            ], 422);
        }

        $token = $user->createToken('finwaveToken')->plainTextToken;
        return response()->json([
            'status' => 200,
            'message' => 'Login Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout Successfully',
        ], 204);
    }
}
