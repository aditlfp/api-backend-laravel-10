<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananUser extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'barang_id',
      'jumlah',
      'satuan_id',
      'harga_satuan',
      'tanggal_pesan',
      'total',
      'status_id'
    ];

    protected $with = ['User','Barang', 'Satuan', 'Status'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function Satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function Status()
    {
        return $this->belongsTo(Status::class);
    }
}
