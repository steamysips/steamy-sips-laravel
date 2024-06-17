<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'email',
        'password',
        'phone_no',
        'first_name',
        'last_name',
    ];

    public function administrator()
    {
        return $this->hasOne(Administrator::class, 'user_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
