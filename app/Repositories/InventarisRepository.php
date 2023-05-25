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
        'last_updt',
        'id_supplier'
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
