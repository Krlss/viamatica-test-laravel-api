<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

use App\Services\UserService;

class UserController extends Controller
{

    public function __construct(
        protected UserService $UserService
    ) {
    }

    public function index()
    {
        return response()->json($this->UserService->all());
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->all();
        return response()->json($this->UserService->create($data));
    }

    public function show($id)
    {
        return response()->json($this->UserService->find($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return response()->json($this->UserService->update($data, $id));
    }

    public function destroy($id)
    {
        return response()->json($this->UserService->delete($id));
    }

    public function login(LoginRequest $request)
    { 
        return response()->json($this->UserService->login($request));
    }

    public function logout(Request $request)
    {
        return response()->json($this->UserService->logout($request));
    }
}
