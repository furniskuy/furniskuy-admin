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
        if (env('DB_CONNECTION') === 'mysql') {
            DB::unprepared('CREATE FUNCTION total_bayar (pid_user INT) RETURNS INT
            BEGIN
                DECLARE total INT;
                SELECT SUM(inventaris.harga * keranjang.jumlah) from keranjang join inventaris on inventaris.id = keranjang.id_barang where id_pembeli = pid_user INTO total;
                RETURN total;
            END
            ');
        } elseif (env('DB_CONNECTION') === 'pgsql') {
            DB::unprepared("CREATE OR REPLACE FUNCTION total_bayar(pid_user INT) RETURNS INT
            AS '
                DECLARE
                total INT;
                BEGIN
                SELECT SUM(inventaris.harga * keranjang.jumlah)
                INTO total
                FROM keranjang
                JOIN inventaris ON inventaris.id = keranjang.id_barang
                WHERE keranjang.id_pembeli = pid_user;

                RETURN total;
                END;
            '
            LANGUAGE plpgsql;
            ");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (env('DB_CONNECTION') === 'mysql') {
            DB::unprepared('DROP FUNCTION IF EXISTS total_bayar');
        } elseif (env('DB_CONNECTION') === 'pgsql') {
            DB::unprepared('DROP FUNCTION IF EXISTS total_bayar');
        }
    }
};
