<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
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

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
