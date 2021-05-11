<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = $request->validated();
        $user['password'] = bcrypt($user['password']);
        $usercreate = User::create($user);

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $usercreate->name,
                'token' => $usercreate->createToken(env('APP_NAME'))->accessToken
            ]
        ], 201);
    }
}
