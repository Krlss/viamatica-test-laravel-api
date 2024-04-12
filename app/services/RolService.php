<?php

namespace App\Services;

use App\Repositories\RolRepository;

class RolService
{

    protected $RolRepository;

    public function __construct(RolRepository $RolRepository)
    {
        $this->RolRepository = $RolRepository;
    }

    public function all()
    {
        return $this->RolRepository->all();
    }

    public function create(array $data)
    {
        return $this->RolRepository->create($data);
    }

    public function find($id)
    {
        return $this->RolRepository->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->RolRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->RolRepository->delete($id);
    }
}
