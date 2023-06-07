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
            DB::unprepared("CREATE TRIGGER hapus_keranjang_setelah_transaksi
            AFTER INSERT ON transaksi
            FOR EACH ROW
            BEGIN
                DELETE FROM keranjang
                WHERE id_pembeli = NEW.id_pembeli AND selected = true;
            END
            ");
        } elseif (env('DB_CONNECTION') === 'pgsql') {
            DB::unprepared("CREATE OR REPLACE FUNCTION hapus_keranjang_setelah_transaksi()
            RETURNS TRIGGER
            AS '
                BEGIN
                DELETE FROM keranjang
                WHERE id_pembeli = NEW.id_pembeli AND selected = true;
                RETURN NEW;
                END;
            '
            LANGUAGE plpgsql;
            ");

            DB::unprepared("CREATE TRIGGER hapus_keranjang_setelah_transaksi_trigger
            AFTER INSERT ON transaksi
            FOR EACH ROW
            EXECUTE FUNCTION hapus_keranjang_setelah_transaksi();
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
            DB::unprepared('DROP TRIGGER IF EXISTS hapus_keranjang_setelah_transaksi');
        } elseif (env('DB_CONNECTION') === 'pgsql') {
            DB::unprepared('DROP TRIGGER IF EXISTS hapus_keranjang_setelah_transaksi_trigger ON transaksi');
            DB::unprepared('DROP FUNCTION IF EXISTS hapus_keranjang_setelah_transaksi');
        }
    }
};
