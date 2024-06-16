<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'street',
        'city',
        'district_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'client_id');
    }
}
