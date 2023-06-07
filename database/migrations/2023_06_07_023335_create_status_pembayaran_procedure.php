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
            DB::unprepared("CREATE PROCEDURE status_transaksi (IN transactionStatus INT, OUT status VARCHAR(20))
            BEGIN
                CASE transactionStatus
                    WHEN 1 THEN SET status = 'Belum Bayar';
                    WHEN 2 THEN SET status = 'Sedang Dikemas';
                    WHEN 3 THEN SET status = 'Dikirim';
                    WHEN 4 THEN SET status = 'Selesai';
                    WHEN 5 THEN SET status = 'Dibatalkan';
                    ELSE SET status = 'Status Tidak Valid';
                END CASE;
                SELECT status;
            END
            ");
        } elseif (env('DB_CONNECTION') === 'pgsql') {
            DB::unprepared(<<<EOD
            CREATE OR REPLACE FUNCTION status_transaksi(transactionStatus INT)
            RETURNS VARCHAR(20)
            AS $$
                DECLARE
                status VARCHAR(20);
                BEGIN
                CASE transactionStatus
                    WHEN 1 THEN status := 'Belum Bayar';
                    WHEN 2 THEN status := 'Sedang Dikemas';
                    WHEN 3 THEN status := 'Dikirim';
                    WHEN 4 THEN status := 'Selesai';
                    WHEN 5 THEN status := 'Dibatalkan';
                    ELSE status := 'Status Tidak Valid';
                END CASE;

                RETURN status;
                END;
            $$
            LANGUAGE plpgsql;
            EOD);
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
            DB::unprepared('DROP FUNCTION IF EXISTS status_transaksi');
        } elseif (env('DB_CONNECTION') === 'pgsql') {
            DB::unprepared('DROP FUNCTION IF EXISTS status_transaksi');
        }
    }
};
