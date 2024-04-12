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
            'name' => 'required|string',
            'status' => 'sometimes|in:in_progress,done'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();

        $order = new Order;
        $order->admin_id = $user->id;
        $order->company_id = $request->company_id;
        $order->name = $request->name;
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
            'name' => 'sometimes|string',
            'status' => 'sometimes|in:in_progress,done'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $order = Order::find($request->id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if ($request->has('name')) {
            $order->name = $request->name;
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
