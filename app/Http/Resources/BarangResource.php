<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
            'nama_barang' => $this->nama_barang,
            'jumlah' => $this->jumlah,
            'keterangan' => $this->keterangan,
            'image' => $this->image,
            'tanggal_masuk' => $this->tanggal_masuk
        ];
    }
}
