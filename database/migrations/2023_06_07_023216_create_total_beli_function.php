<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared('
        CREATE FUNCTION total_bayar (id_user INT) RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT SUM(inventaris.harga * keranjang.jumlah) from keranjang join inventaris on inventaris.id = keranjang.id_barang where id_pembeli = id_user INTO total;
            RETURN total;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS total_bayar');
    }
};
