<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'mitra_id',
        'jumlah',
        'tanggal_keluar'
    ];

    protected $with = ['Barang', 'Mitra'];

    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function Mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
