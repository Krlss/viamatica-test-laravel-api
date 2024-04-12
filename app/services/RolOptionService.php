<?php

namespace App\Services;

use App\Repositories\RolOptionRepository;

class RolOptionService
{

    protected $RolOptionRepository;

    public function __construct(RolOptionRepository $RolOptionRepository)
    {
        $this->RolOptionRepository = $RolOptionRepository;
    }

    public function all()
    {
        return $this->RolOptionRepository->all();
    }

    public function create(array $data)
    {
        return $this->RolOptionRepository->create($data);
    }

    public function find($id)
    {
        return $this->RolOptionRepository->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->RolOptionRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->RolOptionRepository->delete($id);
    }
}
