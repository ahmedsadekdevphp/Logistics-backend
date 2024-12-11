<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully.']);
    }
}
