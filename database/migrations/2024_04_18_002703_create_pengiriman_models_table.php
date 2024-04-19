<?php

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
        Schema::create('pengiriman_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kurir');
            $table->string('resi');
            $table->string('id_wilayah');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_barang');
            $table->string('nama_pengirim');
            $table->string('tlpn_pengirim');
            $table->string('alamat_pengirim');
            $table->string('nama_penerima');
            $table->string('tlpn_penerima');
            $table->string('alamat_penerima');
            $table->string('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman_models');
    }
};
