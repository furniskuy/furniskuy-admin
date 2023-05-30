<?php

namespace App\Repositories;

use App\Models\Keranjang;
use App\Models\Transaksi;
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

    public function keranjangUser($id)
    {
        return $this->model->where('id_pembeli', $id)->get();
    }

    // create transaksi with keranjang
    public function checkout($id)
    {
        $keranjang = $this->model->where('id_pembeli', $id)->get();
        $total = 0;
        foreach ($keranjang as $item) {
            $total += $item->harga;
        }
        $transaksi = [
            'id_pembeli' => $id,
            'terbayar' => 0,
            'harga' => $total,
            'jumlah' => $keranjang->count(),
        ];

        $transaksi = Transaksi::create($transaksi);
        return $transaksi;
    }
}
