<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository
{
    public function all()
    {
        return Person::with('user')->paginate(10);
    }

    public function create(array $data)
    {

        $personCreated = Person::create($data);

        $personCreated->create_user();

        return $personCreated;
        
    }

    public function find($id)
    {
        return Person::find($id);
    }

    public function update(array $data, $id)
    {
        return Person::find($id)->update($data);
    }

    public function delete($id)
    {
        return Person::destroy($id);
    }
}
