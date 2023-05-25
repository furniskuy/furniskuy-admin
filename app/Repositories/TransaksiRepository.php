<?php

namespace App\Repositories;

use App\Models\Transaksi;
use App\Repositories\BaseRepository;

class TransaksiRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id_pegawai',
        'id_kasir',
        'id_pembeli',
        'tanggal',
        'id_barang',
        'terbayar',
        'harga',
        'jumlah'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Transaksi::class;
    }
}
