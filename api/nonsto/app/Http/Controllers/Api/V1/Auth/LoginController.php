<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            return new JsonResponse(['token' => $token], 200);
        }

        return new JsonResponse([
            'message' => 'Unauthenticated.'
        ], 401);
    }
}
