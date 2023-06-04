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

    public function createOrAdd($data)
    {
        $keranjang = $this->model->where('id_pembeli', $data['id_pembeli'])->where('id_barang', $data['id_barang'])->first();
        if ($keranjang) {
            $keranjang->jumlah += $data['jumlah'];
            $keranjang->save();
            return $keranjang;
        } else {
            return $this->create($data);
        }
    }

    public function keranjangUser($id)
    {
        return $this->model->where('id_pembeli', $id)->latest()->get();
    }

    public function checkout($id)
    {
        $keranjang = $this->model->where('id_pembeli', $id)->get();
        $total = 0;
        foreach ($keranjang as $item) {
            $total += $item->barang->harga;
        }
        $input = [
            'id_pembeli' => $id,
            'total_harga' => $total,
            'total_barang' => $keranjang->count(),
            'tenggat_waktu' => now()->addDays(1),
        ];

        $transaksiBarang = $keranjang->mapWithKeys(function ($item) {
            return [$item->id => ['jumlah' => $item->jumlah]];
        });

        $transaksi = Transaksi::create($input);
        $transaksi->listBarang()->syncWithoutDetaching($transaksiBarang);

        return $transaksi;
    }
}
