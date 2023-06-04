<?php

namespace App\Repositories;

use App\Models\Rating;
use App\Repositories\BaseRepository;

class RatingRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'rating',
        'id_user',
        'id_inventaris',
        'review'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Rating::class;
    }
}
