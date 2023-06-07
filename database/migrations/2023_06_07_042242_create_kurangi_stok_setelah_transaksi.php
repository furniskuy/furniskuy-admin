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
        CREATE TRIGGER kurangi_stok_setelah_transaksi
        AFTER INSERT ON transaksi_barang
        FOR EACH ROW
        BEGIN
            DECLARE status INT;
            SELECT status FROM transaksi WHERE id = NEW.id_transaksi INTO status;
            IF status = 5 THEN
                UPDATE inventaris SET jumlah = jumlah + NEW.jumlah WHERE id = NEW.id_inventaris;
            ELSE
                UPDATE inventaris SET jumlah = jumlah - NEW.jumlah WHERE id = NEW.id_inventaris;
            END IF;
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
        DB::unprepared('DROP TRIGGER IF EXISTS kurangi_stok_setelah_transaksi');
    }
};
