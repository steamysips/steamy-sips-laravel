<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'img_url',
        'img_alt_text',
        'calories',
        'category',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_product', 'product_id', 'store_id')->withPivot('stock_level');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')->withPivot('cup_size', 'milk_type', 'quantity', 'unit_price');
    }
}
