<?php

namespace App\Http\Controllers;

use App\Models\PesananUser;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    // default = 1
    public function prosess($id)
    {
        // update To Proses Request Pesanan = status_id : 2
        $data = [
            'status_id' => '2'
        ];

        try {
            $pesanan = PesananUser::findOrFail($id);
            $pesanan->update($data);
            return response()->json(['data' => '$data', 'message' => 'Pesanan Has Proses'], 201);
        } catch (\Throwable $th) {
            throw $th;
        } 
    }


    public function approve($id)
    {

        // update To Approve Request Pesanan = status_id : 3
        $data = [
            'status_id' => '3'
        ];

        try {
            $pesanan = PesananUser::findOrFail($id);
            $pesanan->update($data);
            return response()->json(['data' => '$data', 'message' => 'Pesanan Has Approve And Complete'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function cancelled($id)
    {
        // update To Cancel/NotApprove Request Pesanan = status_id : 4
        $data = [
            'status_id' => '4'
        ];

        try {
            $pesanan = PesananUser::findOrFail($id);
            $pesanan->update($data);
            return response()->json(['data' => '$data', 'message' => 'Pesanan Hasn`t Approve'], 202);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
