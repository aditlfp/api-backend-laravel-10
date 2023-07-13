<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::paginate(50);
        return StatusResource::collection($status);
    }

    public function show($id)
    {
        try {
            $status =  Status::findOrFail($id);
            return response()->json(['data' => $status], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(StatusRequest $request)
    {
        $status = new Status();

        $status = [
            'name' => $request->name
        ];

        try {
            Status::create($status);
            return response()->json(['data' => $status, 'message' => 'Status Has Created'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $status = Status::findOrFail($id);
            return response()->json(['data' => $status], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $status = [
            'name' => $request->name
        ];

        try {
           $statusId = Status::findOrFail($id);
           $statusId->update($status);
            return response()->json(['data' => $statusId, 'message' => 'Status Has Updated'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $statusId = Status::findOrFail($id);
            $statusId->delete();
             return response()->json(['data' => $statusId, 'message' => 'Status Has Deleted'], 200);
         } catch (\Throwable $th) {
             throw $th;
         }
    }
}
