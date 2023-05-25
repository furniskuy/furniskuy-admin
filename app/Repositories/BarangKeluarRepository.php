<?php

namespace App\Repositories;

use App\Models\BarangKeluar;
use App\Repositories\BaseRepository;

class BarangKeluarRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'jumlah',
        'harga',
        'tanggal',
        'id_inventaris'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BarangKeluar::class;
    }
}
