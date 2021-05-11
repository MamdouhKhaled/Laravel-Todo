<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'name' => Auth::user()->name,
                    'token' => Auth::user()->createToken(env('APP_NAME'))->accessToken
                ]
            ]);
        }
    }
}
