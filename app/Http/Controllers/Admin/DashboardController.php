<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SafetyServiceRequest;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Stats Cards
        |--------------------------------------------------------------------------
        */

        $totalUsers = User::count();

        $totalOrders = Order::count();

        $totalRevenue = Order::where('payment_status', 'paid')
            ->sum('grand_total');

        $totalSafetyRequests = SafetyServiceRequest::count();


        /*
        |--------------------------------------------------------------------------
        | Orders Trend (Last 30 Days)
        |--------------------------------------------------------------------------
        */

        $ordersTrend = Order::selectRaw(
                'DATE(created_at) as date,
                 COUNT(*) as total'
            )
            ->whereDate(
                'created_at',
                '>=',
                now()->subDays(30)
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | User Registrations (Last 30 Days)
        |--------------------------------------------------------------------------
        */

        $usersTrend = User::selectRaw(
                'DATE(created_at) as date,
                 COUNT(*) as total'
            )
            ->whereDate(
                'created_at',
                '>=',
                now()->subDays(30)
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Top 10 Selling Products
        |--------------------------------------------------------------------------
        */

        $topProducts = OrderItem::select(
                'product_id',
                DB::raw('SUM(quantity) as total_qty')
            )
            ->with('product:id,name')
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->take(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Order Status
        |--------------------------------------------------------------------------
        */

        $orderStatuses = Order::selectRaw(
                'status,
                 COUNT(*) as total'
            )
            ->groupBy('status')
            ->get();


        return view('admin.dashboard', compact(
            'totalUsers',
            'totalOrders',
            'totalRevenue',
            'totalSafetyRequests',
            'ordersTrend',
            'usersTrend',
            'topProducts',
            'orderStatuses'
        ));
    }
}