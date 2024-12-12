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
    'Order created successfully'=>'Order created successfully',
    'Failed to create order'=>'Failed to create order. Please try again later',
    'status_changed'=>'Status changed successfully !'
];
