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
        DB::unprepared("
        CREATE PROCEDURE status_transaksi (IN transactionStatus INT, OUT status VARCHAR(20))
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS status_transaksi');
    }
};
