<?php

namespace App\Repositories;

use App\Models\Ekspedisi;
use App\Repositories\BaseRepository;

class EkspedisiRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama_ekspedisi',
        'alamat',
        'no_hp',
        'email',
        'website',
        'logo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ekspedisi::class;
    }
}
