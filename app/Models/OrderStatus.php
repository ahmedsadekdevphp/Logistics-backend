<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory,HasUuids;
    public $incrementing = false;
    protected $table = 'lkp_order_statuses';

    protected $fillable = [
        'name'
    ];

}
