<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

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

        for ($i = 0; $i < 84; $i++) {
            $inventaris = new Inventaris;
            $inventaris->nama = $faker->sentence(3);
            $inventaris->jumlah = $faker->numberBetween(1, 100);
            $inventaris->harga = $faker->numberBetween(100000, 10000000);
            $inventaris->deskripsi = $faker->paragraph(3);
            $inventaris->id_user = $faker->numberBetween(1, 1);
            $inventaris->id_supplier = $faker->numberBetween(1, 1);
            $inventaris->id_kategori = $faker->numberBetween(1, 5);
            $inventaris->foto = $faker->randomElement(['sofa-ruang.jpg', 'kursi-unik.jpg', 'bed-set.jpg', 'meja-minimalis.jpg', 'meja-kayu.jpg', 'rak-meja-tv.jpg']);
            $inventaris->tags = $faker->randomElement(['sofa, ruang', 'kursi, unik', 'bed, set', 'meja, minimalis', 'meja, kayu', 'rak, meja, tv']);
            $inventaris->save();
        }
    }
}
