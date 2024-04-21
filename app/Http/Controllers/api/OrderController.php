<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function getOrders(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin_id' => 'sometimes|int',
            'company_id' => 'sometimes|int',
            'status' => 'sometimes|in:in_progress,done',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $query = Order::query();

        if ($request->has('admin_id')) {
            $query->where('admin_id', $request->admin_id);
        }
        if ($request->has('company_id')) {
            $query->where('company_id', $request->company_id);
        }
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->get();

        return response()->json(['message' => 'Order data is available', 'data' => $orders]);
    }

    public function addOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|int',
            'orderers_name' => 'required|string',
            'address' => 'required|string',
            'bean_type' => 'required|in:light,medium,dark',
            'from_district' => 'required|string',
            'amount' => 'required|integer',
            'total' => 'required|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
            'status' => 'sometimes|in:in_progress,done',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();

        $order = new Order;
        $order->admin_id = $user->id;
        $order->company_id = $request->company_id;
        $order->orderers_name = $request->orderers_name;
        $order->address = $request->address;
        $order->bean_type = $request->bean_type;
        $order->from_district = $request->from_district;
        $order->amount = $request->amount;
        $order->total = $request->total;
        if ($request->has('status')) {
            $order->status = $request->status;
        }

        $order->save();

        return response()->json(['message' => 'Order has been created', 'data' => $order]);
    }

    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int',
            'orderers_name' => 'sometimes|string',
            'address' => 'sometimes|string',
            'bean_type' => 'sometimes|in:light,medium,dark',
            'from_district' => 'sometimes|string',
            'amount' => 'sometimes|integer',
            'total' => 'sometimes|numeric|regex:/^-?[0-9]+(\.[0-9]{1,2})?$/',
            'status' => 'sometimes|in:in_progress,done'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $order = Order::find($request->id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if ($request->has('orderers_name')) {
            $order->orderers_name = $request->orderers_name;
        }
        if ($request->has('address')) {
            $order->address = $request->address;
        }
        if ($request->has('bean_type')) {
            $order->bean_type = $request->bean_type;
        }
        if ($request->has('from_district')) {
            $order->from_district = $request->from_district;
        }
        if ($request->has('amount')) {
            $order->amount = $request->amount;
        }
        if ($request->has('total')) {
            $order->total = $request->total;
        }
        if ($request->has('status')) {
            $order->status = $request->status;
        }

        $order->save();

        return response()->json(['message' => 'Order has been updated', 'data' => $order]);
    }

    public function deleteOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $order = Order::find($request->id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order has been deleted']);
    }
}
