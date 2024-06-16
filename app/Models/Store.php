<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $primaryKey = 'store_id';

    protected $fillable = [
        'phone_no', 'street', 'city', 'district_id',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'store_id');
    }
}
