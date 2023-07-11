<?php

namespace App\Http\Controllers;

use App\Http\Requests\MitraRequest;
use App\Http\Resources\MitraResource;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = Mitra::paginate(25);
        return MitraResource::collection($mitra);
    }

    public function store(MitraRequest $request)
    {

        $mitra = new Mitra();

        $mitra = [
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ];

        try {
            Mitra::create($mitra);
            return response()->json(['data' => $mitra, 'message' => 'Mitra Has Created'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function edit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return response()->json($mitra, 200);
    }

    public function update(Request $request, $id)
    {
        $mitra = [
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ];

        try {
            $dataMitra = Mitra::findOrFail($id);
            $dataMitra->update($mitra);
            return response()->json([ 'data' => $mitra, 'message' => 'Mitra Has Updated'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $mitra = Mitra::findOrFail($id);
            $mitra->delete();
            return response()->json([ 'data' => $mitra, 'message' => 'Mitra Has Deleted'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
