<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {


        $orderDay = Order::whereDay('created_at', now())->count();
        $totalRevenue = Order::whereDay('created_at', now())->sum('total');
//        dd($totalRevenue);
        $orderDayTotal = Order::whereDay('updated_at', now())->where('status', 4)->sum('total');
        $orderDayCompleted = Order::whereDay('updated_at', now())->where('status', 4)->count();
//        dd($orderDayCompleted);

        $total7Days = Order::where('status', 4)->whereDate('updated_at', '>=', now()->subDays(6))->sum('total');
//        dd($total7Days);

        $topSelling = OrderDetail::select('product_id', DB::raw('SUM(qty) as quantity'))
            ->with('product')
            ->groupBy('product_id')
            ->orderBy('quantity', 'desc')
            ->limit(6)
            ->get();
//        dd($topSelling);

//        Order
        $status = $request->input('status');
        $list_act = [
            'delete' => 'Temporary delete'
        ];

        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $order = Order::where('status', 0)
                ->orderBy('status', 'asc')
                ->paginate(10);
            $count_user_trash = Order::where('status', 0)->count();
        } elseif ($status == 'delete') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $order = Order::onlyTrashed()
                ->orderBy('status', 'asc')
                ->paginate(10);
        } else {
            $search = '';
            if ($request->input('search')) {
                $search = $request->input('search');
            }
            $order = Order::where(function ($query) use ($search) {
                $query->orWhere('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%");
            })
                ->orderBy('status', 'asc')
                ->paginate(10);
            $count_user_trash = Order::where('status', 0)->count();
        }

        $count_user_active = Order::count();
        $count = [$count_user_active, $count_user_trash];

        return view('admin.dashboard.index',
            compact( 'orderDay', 'totalRevenue','orderDayTotal', 'orderDayCompleted', 'total7Days', 'topSelling',
                'order', 'count', 'list_act', 'status'
            ));
    }

    public function statistical()
    {
        $ordersData = Order::where("status", 4)->select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(total) as total_amount')
        )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return response()->json($ordersData);
    }

    public function order7Days()
    {
        $endDate = now()->toDateString();
        $startDate = now()->subDays(6)->toDateString();

        $ordersData = Order::where('status', 4)
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('DAY(created_at) as day'),
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(total) as total_amount')
            )
            ->groupBy('year', 'month', 'day')
            ->orderBy('year')
            ->orderBy('month')
            ->orderBy('day')
            ->get();

        return response()->json($ordersData);
    }
}
