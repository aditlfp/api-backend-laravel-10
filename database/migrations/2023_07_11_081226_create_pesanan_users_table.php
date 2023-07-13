<?php

use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Barang::class);
            $table->integer('jumlah')->default(0);
            $table->foreignIdFor(Satuan::class)->default(1);
            $table->string('harga_satuan')->default(0);
            $table->string('tanggal_pesan');
            $table->string('total');
            $table->foreignIdFor(Status::class)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_users');
    }
};
