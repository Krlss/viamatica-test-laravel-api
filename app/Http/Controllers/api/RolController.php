<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRolRequest;
use Illuminate\Http\Request;

use App\Services\RolService;

class RolController extends Controller
{

    public function __construct(
        protected RolService $RolService
    ) {
    }

    public function index()
    {
        return response()->json($this->RolService->all());
    }

    public function store(CreateRolRequest $request)
    {
        $data = $request->all();
        return response()->json($this->RolService->create($data));
    }

    public function show($id)
    {
        return response()->json($this->RolService->find($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return response()->json($this->RolService->update($data, $id));
    }

    public function destroy($id)
    {
        return response()->json($this->RolService->delete($id));
    }
}
