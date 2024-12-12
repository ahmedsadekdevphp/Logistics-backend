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
    /**
     * Display a paginated list of all orders
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $orders = Order::with('lastStatus.statusName', 'user')
            ->select('id', 'user_id', 'order_no', 'pickupTime', 'deliveryTime')
            ->orderBY('created_at')
            ->paginate(config('order.paginate_count'));
        return view('admin.orders.index', compact('orders'));
    }


    /**
     * Display the details of a specific order for the admin.
     *
     * @param int $id The ID of the order to be displayed.
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::with('statusDetails', 'user')->find($id);
        $orderStatues = OrderStatus::get()->pluck('name', 'id');
        return view('admin.orders.show', compact('order', 'orderStatues'));
    }


    /**
     * Update the status of a specific order.
     *
     * @param int $id The ID of the order to update.
     * @param \Illuminate\Http\Request $request The HTTP new status.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        OrderStatusDetail::create([
            'order_id' => $id,
            'order_statuse_id' => $request->status,
            'admin_id' => Auth::user()->id
        ]);
        return redirect()->route('admin.orders.index')->with('success', trans('order.status_changed'));
    }
}
