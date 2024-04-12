<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRolOptionRequest;
use Illuminate\Http\Request;

use App\Services\RolOptionService;

class RolOptionController extends Controller
{

    public function __construct(
        protected RolOptionService $RolService
    ) {
    }

    public function index()
    {
        return response()->json($this->RolService->all());
    }

    public function store(CreateRolOptionRequest $request)
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
