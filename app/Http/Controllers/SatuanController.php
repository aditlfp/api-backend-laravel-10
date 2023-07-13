<?php

namespace App\Http\Controllers;

use App\Http\Requests\SatuanRequest;
use App\Http\Resources\SatuanResource;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::paginate(50);
        return SatuanResource::collection($satuan);
    }

    public function show($id)
    {
        try {
            $satuan = Satuan::findOrFail($id);
            return response()->json(['data' => $satuan], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(SatuanRequest $request)
    {
        $satuan = new Satuan();

        $satuan = [
            'name' => $request->name
        ];

        try {
            Satuan::create($satuan);
            return response()->json(['data' => $satuan, 'message' => 'Satuan Has Created'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $satuan = Satuan::findOrFail($id);
            return response()->json(['data' => $satuan], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $satuan = [
            'name' => $request->name
        ];

        try {
           $satuanId = Satuan::findOrFail($id);
           $satuanId->update($satuan);
            return response()->json(['data' => $satuanId, 'message' => 'Satuan Has Updated'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $satuanId = Satuan::findOrFail($id);
            $satuanId->delete();
             return response()->json(['data' => $satuanId, 'message' => 'Satuan Has Deleted'], 200);
         } catch (\Throwable $th) {
             throw $th;
         }
    }

}
