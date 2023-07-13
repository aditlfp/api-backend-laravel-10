<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesananUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id, 
            'user_id' => $this->user_id,
            'barang_id' => $this->barang_id,
            'jumlah' => $this->jumlah,
            'satuan_id' => $this->satuan_id,
            'harga_satuan' => $this->harga_satuan,
            'tanggal_pesan' => $this->tanggal_pesan,
            'total' => $this->total,
            'status_id' => $this->status_id
        ];
    }
}
