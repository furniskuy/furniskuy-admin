<?php

namespace App\Repositories;

use App\Models\Pembeli;
use App\Repositories\BaseRepository;

class PembeliRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'jenis_kelamin',
        'pembeli_baru'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Pembeli::class;
    }
}
