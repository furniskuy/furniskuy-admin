<?php

namespace App\Repositories;

use App\Models\Transaksi;
use App\Repositories\BaseRepository;

class TransaksiRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tanggal_transaksi',
        'total_harga',
        'total_barang',
        'status',
        'status_transaksi',
        'tenggat_waktu',
        'metode_pembayaran',
        'waktu_pembayaran',
        'waktu_pengiriman',
        'id_pembeli'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Transaksi::class;
    }

    public function transaksiUser($id)
    {
        return $this->model->where('id_pembeli', $id)->latest()->get();
    }
}
