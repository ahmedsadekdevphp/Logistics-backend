<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderStoreRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('lastStatus.statusName')
        ->where('user_id', '=', Auth::guard('api')->user()->id)
        ->select('id','order_no','pickupTime','deliveryTime')
        ->orderBY('created_at')
        ->paginate(2);
        return response()->json([
            'status' => 200,
            'data' => $orders
        ]);
    }
    public function store(OrderStoreRequest $request)
    {
        $response = OrderService::storeOrder($request);
        return response()->json($response);
    }
}
