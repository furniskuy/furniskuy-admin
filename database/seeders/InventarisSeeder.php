<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventarisList = [
            [
                "nama" => "Sofa Vintage",
                "jumlah" => 32,
                "harga" => 1500000,
                "deskripsi" => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit quasi ipsam qui sapiente voluptatum aut, deleniti atque sunt incidunt non laudantium animi voluptate aperiam! Corporis possimus aperiam laboriosam deserunt iste.
                Vero officiis ratione porro, unde dolorem expedita odit nisi eos! Impedit ducimus ipsa quos inventore, culpa et eum doloribus quibusdam voluptate reprehenderit quod asperiores debitis magni nihil sint veritatis dignissimos!',
                "id_user" =>  1,
                "id_kategori" =>  1,
                "id_supplier" =>  1,
                "foto" =>  "sofa-vintage.jpg",
                "tags" => "sofa, vintage"
            ],
            [
                "nama" => "Kursi Minimalis",
                "jumlah" => 32,
                "harga" => 1300000,
                "deskripsi" => '
                • Brand      :   FURNISKUY
                • Kategori   :   Kursi
                • Style      :   Minimalis
                • Material   :   Kayu mahoni
                • Warna      :   Abu-abu
                • Tinggi     :   sekitar 40-50 cm.
                • Lebar      :   sekitar 50-80 cm.
                • Berat      :   5 kg.


                Percantik rumah anda dengan koleksi Kursi Minimalis. Dengan warna yang elegan, membuat Kursi ini akan semakin indah jika dipadupadankan dengan Meja pilihan kamu.

                Diperkuat dengan kaki yang terbuat dari Kayu Mahoni, KURSI MINIMALIS - GREY dapat dengan aman digunakan dalam waktu yang lama.
                ',
                "id_user" => 1,
                "id_supplier" =>  1,
                "id_kategori" =>  3,
                "foto" =>  "kursi-minimalis.jpg",
                "tags" => "kursi, minimalis"
            ],
            [
                "nama" => "Sofa Ruang",
                "jumlah" => 32,
                "harga" => 1500000,
                "deskripsi" => '
                • Brand      :   FURNISKUY
                • Kategori   :   Sofa
                • Style      :   Minimalis
                • Material   :   Kayu mahoni
                • Warna      :   Abu-abu
                • Tinggi     :   sekitar 40-50 cm.
                • Lebar      :   sekitar 50-80 cm.
                • Berat      :   5 kg.


                Percantik rumah anda dengan koleksi Sofa Ruang. Dengan warna yang elegan, membuat Sofa ini akan semakin indah jika dipadupadankan dengan Meja pilihan kamu.

                Diperkuat dengan kaki yang terbuat dari Kayu Mahoni, SOFA RUANG - GREY dapat dengan aman digunakan dalam waktu yang lama.
                ',
                "id_user" => 1,
                "id_supplier" =>  1,
                "id_kategori" =>  1,
                "foto" =>  "sofa-ruang.jpg",
                "tags" => "sofa, ruang"
            ],
            [
                "nama" => "Kursi Unik",
                "jumlah" => 32,
                "harga" => 1300000,
                "deskripsi" => '
                • Brand      :   FURNISKUY
                • Kategori   :   Kursi
                • Style      :   Minimalis
                • Material   :   Kayu mahoni
                • Warna      :   Coklat
                • Tinggi     :   sekitar 40-50 cm.
                • Lebar      :   sekitar 50-80 cm.
                • Berat      :   1 kg.


                Percantik rumah anda dengan koleksi Sofa Ruang. Dengan warna yang elegan, membuat Sofa ini akan semakin indah jika dipadupadankan dengan Meja pilihan kamu.

                Diperkuat dengan kaki yang terbuat dari Kayu Mahoni, SOFA RUANG - GREY dapat dengan aman digunakan dalam waktu yang lama.
                ',
                "id_user" => 1,
                "id_supplier" =>  1,
                "id_kategori" =>  1,
                "foto" =>  "kursi-unik.jpg",
                "tags" => "kursi, unik"
            ],
            [
                "nama" => "Bed Set",
                "jumlah" => 32,
                "harga" => 1500000,
                "deskripsi" => '
                • Brand      :   FURNISKUY
                • Kategori   :   Kasur
                • Style      :   Minimalis
                • Material   :   Kayu mahoni
                • Warna      :   Abu-abu
                • Tinggi     :   sekitar 40-50 cm.
                • Lebar      :   sekitar 50-80 cm.
                • Berat      :   15 kg.


                Percantik rumah anda dengan koleksi Bed Set. Dengan warna yang elegan, membuat Sofa ini akan semakin indah jika dipadupadankan dengan Meja pilihan kamu.

                Diperkuat dengan kaki yang terbuat dari Kayu Mahoni, Bed Set dapat dengan aman digunakan dalam waktu yang lama.
                ',
                "id_user" => 1,
                "id_supplier" =>  1,
                "id_kategori" =>  1,
                "foto" =>  "bed-set.jpg",
                "tags" => "bed, set"
            ],

            [
                "nama" => "Meja Minimalis",
                "jumlah" => 32,
                "harga" => 1300000,
                "deskripsi" => '
                • Brand      :   FURNISKUY
                • Kategori   :   Meja
                • Style      :   Minimalis
                • Material   :   Kayu mahoni
                • Warna      :   Abu-abu
                • Tinggi     :   sekitar 40-50 cm.
                • Lebar      :   sekitar 50-80 cm.
                • Berat      :   5 kg.


                Percantik rumah anda dengan koleksi Sofa Ruang. Dengan warna yang elegan, membuat Sofa ini akan semakin indah jika dipadupadankan dengan Meja pilihan kamu.

                Diperkuat dengan kaki yang terbuat dari Kayu Mahoni, SOFA RUANG - GREY dapat dengan aman digunakan dalam waktu yang lama.
            ',
                "id_user" => 1,
                "id_supplier" =>  1,
                "id_kategori" =>  1,
                "foto" =>  "meja-minimalis.jpg",
                "tags" => "meja, minimalis"

            ],
            [
                "nama" => "Meja Kayu",
                "jumlah" => 32,
                "harga" => 1300000,
                "deskripsi" => '
                • Brand      :   FURNISKUY
                • Kategori   :   Sofa
                • Style      :   Minimalis
                • Material   :   Kayu mahoni
                • Warna      :   Abu-abu
                • Tinggi     :   sekitar 40-50 cm.
                • Lebar      :   sekitar 50-80 cm.
                • Berat      :   5 kg.


                Percantik rumah anda dengan koleksi Sofa Ruang. Dengan warna yang elegan, membuat Sofa ini akan semakin indah jika dipadupadankan dengan Meja pilihan kamu.

                Diperkuat dengan kaki yang terbuat dari Kayu Mahoni, SOFA RUANG - GREY dapat dengan aman digunakan dalam waktu yang lama.
                ',
                "id_user" => 1,
                "id_supplier" =>  1,
                "id_kategori" =>  1,
                "foto" =>  "meja-kayu.jpg",
                "tags" => "meja, kayu"
            ],
            [
                "nama" => "Rak Meja TV",
                "jumlah" => 32,
                "harga" => 1300000,
                "deskripsi" => '
                • Brand      :   FURNISKUY
                • Kategori   :   Sofa
                • Style      :   Minimalis
                • Material   :   Kayu mahoni
                • Warna      :   Abu-abu
                • Tinggi     :   sekitar 40-50 cm.
                • Lebar      :   sekitar 50-80 cm.
                • Berat      :   5 kg.


                Percantik rumah anda dengan koleksi Sofa Ruang. Dengan warna yang elegan, membuat Sofa ini akan semakin indah jika dipadupadankan dengan Meja pilihan kamu.

                Diperkuat dengan kaki yang terbuat dari Kayu Mahoni, SOFA RUANG - GREY dapat dengan aman digunakan dalam waktu yang lama.
                ',
                "id_user" => 1,
                "id_supplier" =>  1,
                "id_kategori" =>  1,
                "foto" =>  "rak-meja-tv.jpg",
                "tags" => "rak, meja, tv"
            ]
        ];

        foreach ($inventarisList as $key => $value) {
            Inventaris::create($value);
        }
    }
}
