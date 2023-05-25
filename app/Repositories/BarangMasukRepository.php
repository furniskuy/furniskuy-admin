<?php

namespace App\Repositories;

use App\Models\BarangMasuk;
use App\Repositories\BaseRepository;

class BarangMasukRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'jumlah',
        'harga',
        'nama',
        'tanggal',
        'id_inventaris',
        'id_supplier'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BarangMasuk::class;
    }
}
