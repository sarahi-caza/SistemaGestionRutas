<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);
        $token = Auth::attempt($request->only('email','password'));
        if (!$token) {
            return response()->json([
            'status' => 'error',
            'message' => 'No autorizado',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
        'status' => 'success',
        'token' => $user->createToken($request->name)->plainTextToken,
        ]);
    }

    public function validateLogin (Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]); 
    }
}
