<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = User::where('username', $request->username)->first();

        if ($user) {
            return response()->json(['message' => 'User already exists'], 422);
        }

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User has been created']);
    }

    public function signIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Sign in failed'], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['message' => 'Sign in was successful', 'user' => $user, 'token' => $token]);
    }

    public function signOut(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Sign out was successful']);
    }
}
