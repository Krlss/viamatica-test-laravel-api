<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';

    protected $fillable = [
        'name'
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function options()
    {
        return $this->belongsToMany(RolOption::class, 'rol_rol_options', 'rol_id', 'rol_option_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'rol_user', 'rol_id', 'user_id');
    }
}
