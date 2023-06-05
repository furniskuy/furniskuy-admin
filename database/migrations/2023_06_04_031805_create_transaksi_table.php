<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_transaksi')->default(now());
            $table->integer('total_harga');
            $table->integer('total_barang');

            $table->integer('status')->default(1);
            $table->string('status_transaksi')->default('Belum Bayar');

            $table->dateTime('tenggat_waktu')->nullable();
            $table->integer('metode_pembayaran')->nullable();
            $table->dateTime('waktu_pembayaran')->nullable();
            $table->dateTime('waktu_pengiriman')->nullable();
            $table->timestamps();

            $table->foreignId('id_pembeli')->constrained('users');
        });
    }

    /**'before:tomorrow'
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
