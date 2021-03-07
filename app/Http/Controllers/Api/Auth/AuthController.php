<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected string $typeToken = 'Bearer';

    public function __construct()
    {
        $this->middleware('guest')->only('register');
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'login'    => ['required', 'string', 'unique:users', 'max:40'],
            'email'    => ['required', 'string', 'email:filter', 'unique:users', 'max:40'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $data = request()->all();
        $data['password'] = \Hash::make($data['password']);

        $user = User::create($data);

        $token = $user->createToken('token_name')->plainTextToken;

        return response()->json(['access_token' => $token, 'type_token' => $this->typeToken]);
    }

    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'email'    => ['required', 'string'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $user = User::where('email', request('email'))->first();

        if (! $user || ! \Hash::check(request('password'), $user->password)) {
            return response()->json(['error' => __('auth.failed')]);
        }

        $token = $user->createToken('token_name')->plainTextToken;

        return response()->json(['access_token' => $token, 'type_token' => $this->typeToken]);
    }
}
