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

    public function listing(array $search = [], int $skip = null, int $limit = null, bool $popular = false, int $kategori = 0, array $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        if ($popular) {
            $query = $query->select($columns);
            $query = $query->selectRaw('RANK() OVER (ORDER BY (SELECT SUM(jumlah) FROM transaksi_barang WHERE transaksi_barang.id_inventaris = inventaris.ID) DESC) AS ranking');
            $query = $query->orderBy('ranking');
        }

        if ($kategori > 0) {
            $query = $query->where('id_kategori', $kategori);
        }

        return $query->get($columns);
    }
}
