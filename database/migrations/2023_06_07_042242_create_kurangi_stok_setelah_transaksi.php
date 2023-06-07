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
        if (env('DB_CONNECTION') == 'mysql') {
            DB::unprepared("CREATE TRIGGER kurangi_stok_setelah_transaksi
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
        } elseif (env('DB_CONNECTION') == 'pgsql') {
            DB::unprepared("CREATE OR REPLACE FUNCTION kurangi_stok_setelah_transaksi()
            RETURNS TRIGGER
            AS '
                DECLARE
                status INT;
                BEGIN
                SELECT transaksi.status INTO status
                FROM transaksi
                WHERE id = NEW.id_transaksi;

                IF status = 5 THEN
                    UPDATE inventaris
                    SET jumlah = jumlah + NEW.jumlah
                    WHERE id = NEW.id_inventaris;
                ELSE
                    UPDATE inventaris
                    SET jumlah = jumlah - NEW.jumlah
                    WHERE id = NEW.id_inventaris;
                END IF;

                RETURN NEW;
                END;
            '
            LANGUAGE plpgsql;
            ");

            DB::unprepared("CREATE TRIGGER kurangi_stok_setelah_transaksi_trigger
            AFTER INSERT ON transaksi_barang
            FOR EACH ROW
            EXECUTE FUNCTION kurangi_stok_setelah_transaksi();
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
        if (env('DB_CONNECTION') == 'mysql') {
            DB::unprepared('DROP TRIGGER IF EXISTS kurangi_stok_setelah_transaksi');
        } elseif (env('DB_CONNECTION') == 'pgsql') {
            DB::unprepared('DROP TRIGGER IF EXISTS kurangi_stok_setelah_transaksi_trigger ON transaksi_barang');
            DB::unprepared('DROP FUNCTION IF EXISTS kurangi_stok_setelah_transaksi');
        }
    }
};
