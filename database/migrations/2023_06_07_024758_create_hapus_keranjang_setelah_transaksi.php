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
        CREATE TRIGGER hapus_keranjang_setelah_transaksi
        AFTER INSERT ON transaksi
        FOR EACH ROW
        BEGIN
            DELETE FROM keranjang
            WHERE id_pembeli = NEW.id_pembeli AND selected = true;
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
        DB::unprepared('DROP TRIGGER IF EXISTS hapus_keranjang_setelah_transaksi');
    }
};
