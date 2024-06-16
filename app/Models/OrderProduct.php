<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $primaryKey = ['order_id', 'product_id', 'cup_size', 'milk_type'];
    public $incrementing = false; // To ensure Laravel doesn't try to increment these keys
    protected $keyType = 'string'; // Or 'int' depending on your column types

    protected $fillable = [
        'order_id',
        'product_id',
        'cup_size',
        'milk_type',
        'quantity',
        'unit_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
