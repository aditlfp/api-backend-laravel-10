<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesananResource extends JsonResource
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
            'barang_id' => $this->barang_id,
            'mitra_id' => $this->mitra_id,
            'jumlah' => $this->jumlah,
            'tanggal_keluar' => $this->tanggal_keluar
        ];
    }
}
