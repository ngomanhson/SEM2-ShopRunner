<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Service\Order\OrderServiceInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $orderService;
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService=$orderService;
    }

    public function index(Request $request)
    {
        $status = $request->input('status');

        $list_act = [
            'delete' => 'Temporary delete'
        ];
        $count_user_trash = 0;
        $count_user_cancel = 0;
        $count_user_completed =0;
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $order = Order::where('status', 0)

                ->orderBy('status', 'asc')
                ->paginate(10);
            $count_user_trash = Order::where('status', 0)->count();
            $count_user_cancel = Order::where('status', 5)->count();
            $count_user_completed =Order::where('status',4)->count();


        } elseif ($status == 'cancel') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $order = Order::where('status', 5)
                ->orderBy('status', 'asc')
                ->paginate(10);
            $count_user_cancel = Order::where('status', 5)->count();
            $count_user_trash = Order::where('status', 0)->count();
            $count_user_completed =Order::where('status',4)->count();



        }elseif($status == 'completed') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $order = Order::where('status', 4)
                ->orderBy('status', 'asc')
                ->paginate(10);
            $count_user_cancel = Order::where('status', 5)->count();
            $count_user_trash = Order::where('status', 0)->count();
            $count_user_completed =Order::where('status',4)->count();

        } else {
            $search = $request->input('search');
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            $order = Order::where(function ($query) use ($search, $start_date, $end_date) {
                $query->orWhere('order_code', 'LIKE', "%{$search}%");

                // Kiểm tra và thêm điều kiện lọc theo ngày/tháng/năm
                if ($start_date && $end_date) {
                    $query->whereBetween('created_at', [$start_date, $end_date]);
                } elseif ($start_date) {
                    $query->whereDate('created_at', '>=', $start_date);
                } elseif ($end_date) {
                    $query->whereDate('created_at', '<=', $end_date);
                }
            })
                ->orderBy('status', 'asc')
                ->paginate(10);
            // Số lượng đơn hàng có trạng thái 0 sẽ là 0
            $count_user_trash = Order::where('status', 0)->count();
            $count_user_cancel = Order::where('status', 5)->count();
            $count_user_completed =Order::where('status',4)->count();


        }

        $count_user_active = Order::count();

        $count = [$count_user_active, $count_user_trash,$count_user_cancel,$count_user_completed];

        return view("admin.orders.index", compact('order', 'count', 'list_act', 'status'));
    }
    public function show($id, Request $request){

        $order =Order::find($id);
        $orderId = $id; // Lấy giá trị của $id và gán cho biến $orderId
        $subtotal = 0;
        $vatRate = 0.1;
        $shippingFee = 0;

        foreach ($order->orderDetails as $orderDetail) {
            $subtotal += $orderDetail->total;
        }

        $vatAmount = $subtotal * $vatRate;

        if ($order->shipping_method == 'Standard Shipping') {
            $shippingFee = 10;
        } elseif ($order->shipping_method == 'Express Shipping') {
            $shippingFee = 30;
        }

        $total = $subtotal + $vatAmount + $shippingFee;


        return view('admin.orders.show', compact('order', 'orderId', 'subtotal', 'vatAmount', 'total', 'shippingFee'));
    }
    public function confirmPayment(Request $request)
    {
        $orderId = $request->input('orderId');

        // Gọi phương thức sác nhận đơn hàng từ OrderService
        $this->orderService->confirmOrderPayment($orderId);

        return redirect('admin/orders')->with('status', 'Order payment confirmed successfully');
    }
    public function cancelOrder(Request $request, $orderId)
    {
        // Kiểm tra và cập nhật trạng thái của đơn hàng
        $order = Order::find($orderId);
        if ($order) {
            $order->status = 5; // Chuyển trạng thái sang 5 (CANCELLED)
            $order->save();
        }

        // Redirect hoặc trả về phản hồi tương ứng
        return redirect('admin/orders')->with('status', 'Order payment confirmed successfully'); // Ví dụ: Chuyển hướng trở lại trang trước đó
    }

}
