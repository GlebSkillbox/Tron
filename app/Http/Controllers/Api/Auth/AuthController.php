<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User\User;

class AuthController extends Controller
{
    protected string $typeToken = 'Bearer';

    public function __construct()
    {
        $this->middleware('guest')->only('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        $token = $user->createToken('token_name')->plainTextToken;

        return response()->json(['access_token' => $token, 'type_token' => $this->typeToken]);
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            $token = auth()->user()->createToken('token')->plainTextToken;

            return response()->json(['access_token' => $token, 'type_token' => $this->typeToken]);
        }

        return response()->json(['error' => __('auth.failed')], 401);
    }
}
