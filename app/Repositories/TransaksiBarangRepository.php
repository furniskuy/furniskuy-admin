<?php

namespace App\Repositories;

use App\Models\TransaksiBarang;
use App\Repositories\BaseRepository;

class TransaksiBarangRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id_inventaris',
        'id_transaksi',
        'jumlah'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TransaksiBarang::class;
    }
}
