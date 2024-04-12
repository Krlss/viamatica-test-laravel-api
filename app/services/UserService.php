<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{

    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function all()
    {
        return $this->UserRepository->all();
    }

    public function create(array $data)
    {
        return $this->UserRepository->create($data);
    }

    public function find($id)
    {
        return $this->UserRepository->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->UserRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->UserRepository->delete($id);
    }

    public function login(Request $data)
    {
        return $this->UserRepository->login($data);
    }

    public function logout(Request $data)
    {
        return $this->UserRepository->logout($data);
    }
}
