<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePersonRequest;
use Illuminate\Http\Request;

use App\Services\PersonService;

class PersonController extends Controller
{

    public function __construct(
        protected PersonService $personService
    ) {
    }

    public function index()
    {
        return response()->json($this->personService->all());
    }

    public function store(CreatePersonRequest $request)
    {
        $data = $request->all();
        return response()->json($this->personService->create($data));
    }

    public function show($id)
    {
        return response()->json($this->personService->find($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return response()->json($this->personService->update($data, $id));
    }

    public function destroy($id)
    {
        return response()->json($this->personService->delete($id));
    }
}
