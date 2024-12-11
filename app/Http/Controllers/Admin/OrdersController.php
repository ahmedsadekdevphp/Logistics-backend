<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderStatusDetail;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('lastStatus.statusName')
            ->select('id', 'order_no', 'pickupTime', 'deliveryTime')
            ->orderBY('created_at')
            ->paginate(config('order.paginate_count'));
        return view('admin.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);
        $orderStatues = OrderStatus::get()->pluck('name', 'id');
        return view('admin.orders.show', compact('order', 'orderStatues'));
    }
    public function update($id, Request $request)
    {
        $order = Order::find($id);
        OrderStatusDetail::create([
            'order_id' => $request->order_id,
            'order_status_id' => $request->order_status_id,
            'admin_id' => Auth::user()->id
        ]);
        return view('admin.orders.index', compact('order'));
    }
}
