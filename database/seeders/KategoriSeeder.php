<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sofa = new Kategori;
        $sofa->nama_kategori = 'Sofa';
        $sofa->slug_kategori = 'sofa';
        $sofa->tags = 'sofa';
        $sofa->save();

        $kasur = new Kategori;
        $kasur->nama_kategori = 'Kasur';
        $kasur->slug_kategori = 'kasur';
        $kasur->tags = 'kasur';
        $kasur->save();

        $kursi = new Kategori;
        $kursi->nama_kategori = 'Kursi';
        $kursi->slug_kategori = 'kursi';
        $kursi->tags = 'kursi';
        $kursi->save();

        $meja = new Kategori;
        $meja->nama_kategori = 'Meja';
        $meja->slug_kategori = 'meja';
        $meja->tags = 'meja';
        $meja->save();

        $rak = new Kategori;
        $rak->nama_kategori = 'Rak';
        $rak->slug_kategori = 'rak';
        $rak->tags = 'rak';
        $rak->save();
    }
}
