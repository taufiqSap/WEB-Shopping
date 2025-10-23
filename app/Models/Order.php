<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'total_price',
        'payment_method',
        'payment_status',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
