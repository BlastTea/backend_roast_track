<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesStatisticsController extends Controller
{
    public function getSalesStatistics(Request $request)
    {
        $now = now('Asia/Jakarta');

        $startOfWeek = $now->startOfWeek()->copy();
        $endOfWeek = $now->endOfWeek()->copy();

        $queryStart = $startOfWeek->toDateTimeString();
        $queryEnd = $endOfWeek->toDateTimeString();

        $dateRange = [];
        for ($date = clone $startOfWeek; $date->lte($endOfWeek); $date->addDay()) {
            $dateRange[$date->toDateString()] = 0;
        }

        $salesData = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total_sales')
        )
            ->whereBetween('created_at', [$queryStart, $queryEnd])
            ->where('company_id', $request->user()->company_id)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->keyBy('date');

        foreach ($dateRange as $date => $total) {
            $dateRange[$date] = isset($salesData[$date]) ? $salesData[$date]->total_sales : 0;
        }

        return response()->json([
            'message' => 'Sales statistics grouped by day for the current week',
            'data' => [
                'sales_statistics' => $dateRange,
                'start' => $queryStart,
                'end' => $queryEnd,
            ],
        ]);
    }
}
