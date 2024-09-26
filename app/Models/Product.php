<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $fillable = ['name', 'calories', 'img_url', 'img_alt_text', 'category', 'price', 'description'];

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'product_store', 'product_id', 'store_id');
    }
    
    // One-to-many relationship with reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'product_id');
    }
}
