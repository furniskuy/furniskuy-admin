<?php

namespace App\Repositories;

use App\Models\Inventaris;
use App\Models\TransaksiBarang;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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
        'tags',
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
            if (env('DB_CONNECTION') == 'mysql') {
                $query = $query->select($columns);
                $query = $query->selectRaw('RANK() OVER (ORDER BY (SELECT SUM(jumlah) FROM transaksi_barang WHERE transaksi_barang.id_inventaris = inventaris.ID) DESC) AS ranking');
                $query = $query->orderBy('ranking');
            } elseif (env('DB_CONNECTION') == 'pgsql') {
                $query = $query->select($columns);
                $sub = TransaksiBarang::selectRaw('id_inventaris, sum(jumlah) as total_jumlah')->groupBy('id_inventaris');
                $query = $query->selectRaw('RANK() OVER (ORDER BY subquery.total_jumlah) AS ranking');
                $query = $query->leftJoinSub($sub, 'subquery', function ($join) {
                    $join->on('inventaris.id', '=', 'subquery.id_inventaris');
                });
                $query = $query->orderBy('ranking');
            }
        }

        if ($kategori > 0) {
            $query = $query->where('id_kategori', $kategori);
        }

        return $query->get($columns);
    }
}
