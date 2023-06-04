<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Repositories\BaseRepository;

class PegawaiRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'tanggal_lahir'
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
