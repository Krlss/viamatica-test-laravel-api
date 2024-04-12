<?php

namespace App\Repositories;

use App\Models\RolOption;

class RolOptionRepository
{
    public function all()
    {
        return RolOption::with('roles')->paginate(10);
    }

    public function create(array $data)
    {

        $rolOption = RolOption::create($data);

        if (isset($data['roles']) && is_array($data['roles'])) {
            $rolOption->roles()->sync($data['roles']);
        }

        return $rolOption;
    }

    public function find($id)
    {
        return RolOption::find($id);
    }

    public function update(array $data, $id)
    {
        return RolOption::find($id)->update($data);
    }

    public function delete($id)
    {
        return RolOption::destroy($id);
    }
}
