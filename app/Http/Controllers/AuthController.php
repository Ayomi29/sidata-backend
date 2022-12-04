<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $valid['password'] = bcrypt($valid['password']);
        $user = User::create($valid);

        return response()->json([
            'message' => 'Registration successful',
            'status' => 200,
            'data' => $user,
            // 'token' => $request->user()->createToken()->plainTextToken

        ]);
    }

    public function authenticate(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required'
        // ]);

        // if (!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'message' => 'Invalid credentials',
        //         'status' => 403
        //     ]);
        // }

        $request->all();
        return response()->json([
            'message' => 'login successful',
            'status' => 200,
            'data' => auth()->user(),
            // 'token' => $request->user()->createToken('secret')->plainTextToken
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout successful',
            'status' => 200,
        ]);
    }
}
