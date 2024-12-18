<?php
return [
    'location' => [
        'required' => 'The location is required.',
        'string' => 'The location must be a valid string.',
        'max' => 'The location cannot be longer than 255 characters.',
    ],
    'size' => [
        'required' => 'The size is required.',
        'string' => 'The size must be a valid string.',
        'max' => 'The size cannot be longer than 100 characters.',
    ],
    'weight' => [
        'required' => 'The weight is required.',
        'numeric' => 'The weight must be a valid number.',
        'min' => 'The weight must be at least 0.',
    ],
    'pickupTime' => [
        'required' => 'The pickup time is required.',
        'date_format' => 'The pickup time must follow the format Y-m-d H:i:s.',
        'after_or_equal' => 'The pickup time must be today or later.',
    ],
    'deliveryTime' => [
        'required' => 'The delivery time is required.',
        'date_format' => 'The delivery time must follow the format Y-m-d H:i:s.',
        'after' => 'The delivery time must be after the pickup time.',
    ],
    'Order created successfully' => 'Order created successfully,Your Order No is :',
    'Failed to create order' => 'Failed to create order. Please try again later',
    'status_changed' => 'Status changed successfully !',
    'Email sent successfully' => 'Email sent successfully !',
    'orders' => 'Orders',
    'order_list' => 'Order List',
    'user_name' => 'User Name',
    'order_number' => 'Order Number',
    'pickup_time' => 'Pickup Time',
    'delivery_time' => 'Delivery Time',
    'status' => 'Status',
    'actions' => 'Actions',
    'no_status' => 'No Status',
    'na' => 'N/A',
    'view' => 'View',
    'send_email' => 'Send Email',
    'no_orders_found' => 'No orders found.',
    'order_details' => 'Order Details',
    'order_no' => 'Order No',
    'placed_at' => 'Placed At',
    'location' => 'Location',
    'size' => 'Size',
    'weight' => 'Weight',
    'pickup_time' => 'Pickup Time',
    'delivery_time' => 'Delivery Time',
    'user_name' => 'User Name',
    'user_email' => 'User Email',
    'order_status_details' => 'Order Status Details',
    'order_status_control' => 'Order Status Control',
    'status' => 'Status',
    'update_status' => 'Update Status',
    'send_email_to' => 'Send Email to :user',
    'recipient_email' => 'Recipient Email',
    'subject' => 'Subject',
    'subject_placeholder' => 'Enter the subject here...',
    'body' => 'Body',
    'body_placeholder' => 'Enter the body of the email here...',
    'send_email' => 'Send Email',

];
