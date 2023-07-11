<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesananRequest;
use App\Http\Resources\PesananResource;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::paginate(20);
        return PesananResource::collection($pesanan);
    }

    public function store(PesananRequest $request)
    {
        $pesanan = new Pesanan();

        $pesanan = [
            'barang_id' => $request->barang_id,
            'mitra_id' => $request->mitra_id,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
        ];

        try {
            Pesanan::create($pesanan);
            return response()->json(['data' => $pesanan, 'message' => 'Pesanan Has Created'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $pesananId  = Pesanan::findOrFail($id);
            return response()->json([ 'data' => $pesananId], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $pesanan = [
            'barang_id' => $request->barang_id,
            'mitra_id' => $request->mitra_id,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
        ];

        try {
            $pesananId  = Pesanan::findOrFail($id);
            $pesananId->update($pesanan);
            return response()->json([ 'data' => $pesanan, 'message' => 'Pesanan Has Updated'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $pesananId  = Pesanan::findOrFail($id);
            $pesananId->delete();
            return response()->json([ 'data' => $pesananId, 'message' => 'Pesanan Has Deleted'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
