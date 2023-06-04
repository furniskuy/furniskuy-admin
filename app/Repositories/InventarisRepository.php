<?php

namespace App\Repositories;

use App\Models\Inventaris;
use App\Repositories\BaseRepository;

class InventarisRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'jumlah',
        'harga',
        'deskripsi',
        'foto',
        'id_user',
        'id_kategori',
        'id_supplier',
        'tags'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Inventaris::class;
    }
}
