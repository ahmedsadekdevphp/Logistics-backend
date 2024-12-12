<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body>
    <p>{{ $body }}</p>
    <p><strong>Order Number:</strong> {{ $order->order_no }}</p>
    <p><strong>Pickup Time:</strong> {{ $order->pickupTime }}</p>
    <p><strong>Delivery Time:</strong> {{ $order->deliveryTime }}</p>
</body>
</html>
