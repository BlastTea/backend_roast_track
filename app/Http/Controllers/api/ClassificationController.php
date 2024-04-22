<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ClassificationResult;
use App\Models\ClassificationRoastingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassificationController extends Controller
{
    public function addRoastingClassification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'roasting_id' => 'required|int',
            'result.*.*' => 'required|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
            'result_label' => 'required|in:green,light,medium,dark'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $classification = new ClassificationRoastingResult;
        $classification->roasting_id = $request->roasting_id;
        $classification->result = $request->result;
        $classification->result_label = $request->result_label;
        $classification->save();

        return response()->json(['message' => 'Classification has been created', 'data' => $classification]);
    }

    public function addClassification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'result.*.*' => 'required|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
            'result_label' => 'required|in:green,light,medium,dark'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $classification = new ClassificationResult;
        $classification->company_id = $request->company_id;
        $classification->result = $request->result;
        $classification->result_label = $request->result_label;
        $classification->save();

        return response()->json(['message' => 'Classification has been created', 'data' => $classification]);
    }
}
