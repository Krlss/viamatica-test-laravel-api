<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolOption extends Model
{
    use HasFactory;

    protected $table = 'rol_options';

    protected $fillable = [
        'name'
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_rol_options', 'rol_option_id', 'rol_id');
    }
}
