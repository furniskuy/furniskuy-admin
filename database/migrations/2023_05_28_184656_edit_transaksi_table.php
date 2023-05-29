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
        // change id_barang to array of id_barang
        Schema::table('transaksi', function (Blueprint $table) {
            $table->date('tenggat_waktu')->nullable();
            $table->integer('metode_pembayaran')->nullable();
            $table->dateTime('waktu_pembayaran')->nullable();
            $table->dateTime('waktu_pengiriman')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('tenggat_waktu');
            $table->dropColumn('metode_pembayaran');
            $table->dropColumn('waktu_pembayaran');
            $table->dropColumn('waktu_pengiriman');
            $table->dropTimestamps();
        });
    }
};
