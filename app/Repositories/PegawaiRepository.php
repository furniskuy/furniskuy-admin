<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Repositories\BaseRepository;

class PegawaiRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tanggal_lahir',
        'jenis_kelamin',
        'nama'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Pegawai::class;
    }
}
