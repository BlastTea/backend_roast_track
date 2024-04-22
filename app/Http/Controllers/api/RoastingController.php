<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Order;
use App\Models\Roasting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoastingController extends Controller
{
    public function addRoasting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|int',
            'unit' => 'required|in:fahrenheit,celcius',
            'time_elapsed' => 'required|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
            'degrees.*.type' => 'required|in:charge,dry_end,fc_start,fc_end,sc_start,drop',
            'degrees.*.env_temp' => 'sometimes|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
            'degrees.*.bean_temp' => 'required|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
            'degrees.*.time_elapsed' => 'required|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        $user = $request->user();

        try {
            $roasting = new Roasting;
            $roasting->roastery_id = $user->id;
            $roasting->order_id = $request->order_id;
            $roasting->unit = $request->unit;
            $roasting->time_elapsed = $request->time_elapsed;
            $roasting->save();

            foreach($request->degrees as $degree) {
                $degreeDb = new Degree;
                $degreeDb->roasting_id = $roasting->id;
                $degreeDb->type = $degree['type'];
                if (isSet($degree['env_temp'])) {
                    $degreeDb->env_temp = $degree['env_temp'];
                }
                $degreeDb->bean_temp = $degree['bean_temp'];
                $degreeDb->time_elapsed = $degree['time_elapsed'];
                $degreeDb->save();
            }

            // This is only temporary :)
            $order = Order::find($request->order_id);
            if ($order->roastings->count() > 0) {
                $order->status = 'done';
                $order->save();
            }

            DB::commit();

            $data = $roasting->load('degrees');
            return response()->json(['message' => 'Roasting has been created', 'data' => $data]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
