<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;

    protected $fillable = [
        'location',
        'size',
        'weight',
        'pickupTime',
        'deliveryTime',
        'user_id',
        'order_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the last status of the order.
     */
    public function lastStatus()
    {
        return $this->hasOne(OrderStatusDetail::class, 'order_id')
            ->latest('created_at')->select(['id', 'order_statuse_id', 'order_id']);
    }

    /**
     * Get the statuses of the order.
     */
    public function statusDetails()
    {
        return $this->hasMany(OrderStatusDetail::class, 'order_id');
    }
}
