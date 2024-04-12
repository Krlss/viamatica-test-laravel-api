<?php

namespace App\Repositories;

use App\Models\Rol;

class RolRepository
{
    public function all()
    {
        return Rol::with('options', 'users')->paginate(10);
    }

    public function create(array $data)
    {
        return Rol::create($data);
    }

    public function find($id)
    {
        return Rol::find($id);
    }

    public function update(array $data, $id)
    {
        return Rol::find($id)->update($data);
    }

    public function delete($id)
    {
        return Rol::destroy($id);
    }
}
