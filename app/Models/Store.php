<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $primaryKey = 'store_id';
    protected $fillable = ['phone_no', 'street', 'city', 'districts', 'coordinate'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_store', 'store_id', 'product_id');
    }
}
