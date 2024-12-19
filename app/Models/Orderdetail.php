<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    protected $table = 'orderdetail'; 
    public $timestamps = false;

    protected $fillable = ['order_id', 'product_id', 'price', 'discount', 'qty', 'amount'];

    // Liên kết với bảng orders
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Liên kết với bảng products
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
