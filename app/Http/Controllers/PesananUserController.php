<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesananUserRequest;
use App\Http\Resources\PesananUserResource;
use App\Models\PesananUser;
use Illuminate\Http\Request;

class PesananUserController extends Controller
{
    public function index()
    {
        $pesananDatas = PesananUser::paginate(50);
        return PesananUserResource::collection($pesananDatas);
    }

    public function store(PesananUserRequest $request)
    {
        $datas = new PesananUser();

        $datas = [
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'satuan_id' => $request->satuan_id,
            'harga_satuan' => $request->harga_satuan,
            'tanggal_pesan' => $request->tanggal_pesan,
            'total' => $request->total,
            'status_id' => $request->status_id
        ];

        try {
            PesananUser::create($datas);
            return response()->json(['data' => $datas, 'message' => 'Pesanan Has Created'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        try {
            $datas = PesananUser::findOrFail($id);
            return new PesananUserResource($datas);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $datas = PesananUser::findOrFail($id);
            return new PesananUserResource($datas);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $datas = [
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'satuan_id' => $request->satuan_id,
            'harga_satuan' => $request->harga_satuan,
            'tanggal_pesan' => $request->tanggal_pesan,
            'total' => $request->total,
            'status_id' => $request->status_id
        ];

        try {
            $pesanan = PesananUser::findOrFail($id);
            $datPesanan = $pesanan->update($datas);
            return response()->json(['data' => $datPesanan, 'message' => 'Pesanan Has Updated'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $datas = PesananUser::findOrFail($id);
            $datas->delete();
            return response()->json(['data' => $datas, 'message' => 'Pesanan Has Deleted'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
