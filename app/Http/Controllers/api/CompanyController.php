<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Member;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanies(Request $request) {
        $user = $request->user();

        $companies = Company::whereHas('members', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['members' => function($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->get();

        return response()->json(['message' => 'Companies data is available', 'data' => $companies]);
    }
}
