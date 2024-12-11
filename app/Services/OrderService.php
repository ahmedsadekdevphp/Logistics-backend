<?php

namespace App\Services;

use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderStatusDetail;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
class OrderService
{
    /**
     * Store a new order and its pending status.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public static function storeOrder($request)
    {
        try {
            $orderData = $request->only([
                'location',
                'size',
                'weight',
                'pickupTime',
                'deliveryTime'
            ]);
            $orderData['pickupTime'] = Carbon::parse($request->pickupTime)->format('Y-m-d H:i:s');
            $orderData['deliveryTime'] = Carbon::parse($request->deliveryTime)->format('Y-m-d H:i:s');
            $orderData['order_no'] = Self::generateOrderNumber();
            $orderData['user_id'] = Auth::guard('api')->user()->id;
            $order = Order::create($orderData);
            $pendingStatusId = self::getPendingStatus();
            self::createOrderStatusDetail($pendingStatusId, $order->id);
            return [
                'status' => Response::HTTP_CREATED,
                'message' => trans('order.Order created successfully'),
                'data' => $order->order_no,
            ];
        } catch (Exception $e) {

            Log::info($e);
            return [
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => trans('order.Failed to create order'),
                'data' => null,
            ];
        }
    }

    /**
     * Create a new order status detail.
     *
     * @param string $orderId
     * @param string $statusId
     * @return void
     */
    private static function createOrderStatusDetail($statusId, $orderId)
    {
        OrderStatusDetail::create([
            'order_id' => $orderId,
            'order_statuse_id' => $statusId,
        ]);
    }

    /**
     * Retrieve the ID of the 'pending' status.
     *
     * @return int
     */
    public static function getPendingStatus()
    {
        $status = OrderStatus::where('name', '=', config('order.pending_status'))->first();
        return $status->id;
    }

    /**
     * Generate a unique order number with one character and numbers.
     *
     * @return string
     */
    public static function generateOrderNumber()
    {
        do {
            $orderNo = self::createRandomOrderNumber();
        } while (self::orderNumberExists($orderNo));

        return $orderNo;
    }
    /**
     * Create a random order number of length 6 with one character.
     *
     * @return string
     */
    private static function createRandomOrderNumber()
    {
        $char = Str::upper(Str::random(1));
        $numbers = mt_rand(10000, 99999);
        $orderNo = str_shuffle($char . $numbers);
        return $orderNo;
    }

    /**
     * Check if the order number already exists.
     *
     * @param string $orderNo
     * @return bool
     */
    private static function orderNumberExists(string $orderNo)
    {
        return Order::where('order_no', $orderNo)->exists();
    }
}
