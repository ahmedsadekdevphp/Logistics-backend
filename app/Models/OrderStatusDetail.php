<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusDetail extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $fillable = [
        'admin_id',
        'order_id',
        'order_statuse_id',
    ];

    /**
     * Get the last status of the order.
     */
    // In OrderStatusDetail model
    public function statusName()
    {
        return $this->belongsTo(OrderStatus::class, 'order_statuse_id')->select(['id', 'name','style']);
    }
}
