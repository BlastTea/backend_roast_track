<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RoasteryController extends Controller
{
    public function getRoasteries(Request $request)
    {
        $company = $request->user()->company;

        $query = User::where('role', 'roastery');

        $query->where('company_id', $company->company_id);

        $users = $query->get();

        return response()->json(['message' => 'Roasteries data is available', 'data' => $users]);
    }

    public function addRoastery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string',
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:13',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();

        $company = $user->company;

        if (!$company) {
            return response()->json(['message' => 'Company is not found'], 404);
        }

        $user = new User;
        $user->company_id = $request->company_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'roastery';
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->description = $request->description;
        $user->save();

        return response()->json(['message' => 'Roastery has been created', 'data' => $user]);
    }

    public function updateRoastery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int',
            'email' => 'sometimes|email|max:100',
            'password' => 'sometimes|string',
            'name' => 'sometimes|string|max:100',
            'address' => 'sometimes|string|max:255',
            'phone_number' => 'sometimes|string|max:13',
            'description' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['message' => 'User is not found'], 404);
        }

        if ($user->role !== 'roastery') {
            return response()->json(['message' => 'User is not a roastery'], 422);
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
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

        return response()->json(['message' => 'Roastery has been updated', 'data' => $user]);
    }

    public function deleteRoastery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['message' => 'User is not found'], 404);
        }

        if ($user->role !== 'roastery') {
            return response()->json(['message' => 'User is not a roastery'], 422);
        }

        $user->delete();

        return response()->json(['message' => 'Roastery has been deleted']);
    }
}
