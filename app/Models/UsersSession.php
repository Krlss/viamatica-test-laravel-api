<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersSession extends Model
{
    use HasFactory;

    protected $table = 'users_sessions';

    protected $fillable = [
        'login',
        'logout',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
