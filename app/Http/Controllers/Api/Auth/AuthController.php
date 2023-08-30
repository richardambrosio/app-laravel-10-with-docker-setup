<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }

        $user->tokens()->delete(); //remove all tokens
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,

        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); //remove all tokens

        return response()->json([
            'message' => 'Success',
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'me' => $request->user(),
        ]);
    }
}
