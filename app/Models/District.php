<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $primaryKey = 'district_id';

    protected $fillable = [
        'name',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'district_id');
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'district_id');
    }
}
