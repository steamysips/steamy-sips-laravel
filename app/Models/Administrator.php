<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
         'job_title', 'is_super_admin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
