<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderStoreRequest;
use App\Services\OrderService;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Fetch and return a paginated list of orders for the  user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $orders = Order::with('lastStatus.statusName')
            ->where('user_id', '=', Auth::guard('api')->user()->id)
            ->select('id', 'order_no', 'pickupTime', 'deliveryTime')
            ->orderBY('created_at')
            ->paginate(config('order.paginate_count'));
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $orders
        ]);
    }

    /**
     * Handle the request to create a new order.
     *
     * @param OrderStoreRequest $request The validated request  order data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderStoreRequest $request)
    {
        $response = OrderService::storeOrder($request);
        return response()->json($response);
    }
}
