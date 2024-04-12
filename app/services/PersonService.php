<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService
{

    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function all()
    {
        return $this->personRepository->all();
    }

    public function create(array $data)
    {
        return $this->personRepository->create($data);
    }

    public function find($id)
    {
        return $this->personRepository->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->personRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->personRepository->delete($id);
    }
}
