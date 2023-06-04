<?php

namespace Database\Seeders;

use App\Models\MetodePembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bni = new MetodePembayaran;
        $bni->logo = 'bni.png';
        $bni->nama_bank = 'BNI';
        $bni->no_rek = '1234567890';
        $bni->atas_nama = 'John Doe';
        $bni->save();

        $bri = new MetodePembayaran;
        $bri->logo = 'bri.png';
        $bri->nama_bank = 'BRI';
        $bri->no_rek = '1234567890';
        $bri->atas_nama = 'John Doe';
        $bri->save();

        $bca = new MetodePembayaran;
        $bca->logo = 'bca.png';
        $bca->nama_bank = 'BCA';
        $bca->no_rek = '1234567890';
        $bca->atas_nama = 'John Doe';
        $bca->save();
    }
}
