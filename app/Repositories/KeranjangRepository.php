<?php

namespace App\Repositories;

use App\Models\Keranjang;
use App\Repositories\BaseRepository;

class KeranjangRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id_barang',
        'id_pembeli',
        'harga',
        'jumlah'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Keranjang::class;
    }
}
