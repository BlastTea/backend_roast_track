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
            'result' => 'required|string',
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

    public function getClassification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'sometimes|date',
            'finish_date' => 'sometimes|date|after:start_date'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $query = ClassificationResult::query();

        if ($request->has('start_date') and $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->finish_date]);
        }

        $classifications = $query->get();

        return response()->json(['message' => 'Classification data is available', 'data' => $classifications]);
    }

    public function addClassification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'result' => 'required|string',
            'result_label' => 'required|in:green,light,medium,dark'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $classification = new ClassificationResult;
        $classification->company_id = $request->user()->company_id;
        $classification->result = $request->result;
        $classification->result_label = $request->result_label;
        $classification->save();

        return response()->json(['message' => 'Classification has been created', 'data' => $classification]);
    }
}
