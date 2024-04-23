<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function updateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'sometimes|email|max:100',
            'name' => 'sometimes|string|max:100',
            'address' => 'sometimes|string|max:255',
            'phone_number' => 'sometimes|string|max:13',
            'description' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('address')) {
            $user->address = $request->address;
        }
        if ($request->has('phone_number')) {
            $user->phone_number = $request->phone_number;
        }
        if ($request->has('description')) {
            $user->description = $request->description;
        }
        $user->save();

        return response()->json(['message' => 'Data has been updated', 'data' => $user]);
    }

    public function updatePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'new_password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Old password is wrong'], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Data has been updated']);
    }
}
