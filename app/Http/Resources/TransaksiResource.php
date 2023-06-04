<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tanggal_transaksi' => $this->tanggal_transaksi,
            'total_harga' => $this->total_harga,
            'total_barang' => $this->total_barang,
            'status' => $this->status,
            'status_transaksi' => $this->status_transaksi,
            'tenggat_waktu' => $this->tenggat_waktu,
            'metode_pembayaran' => $this->metode_pembayaran,
            'waktu_pembayaran' => $this->waktu_pembayaran,
            'waktu_pengiriman' => $this->waktu_pengiriman,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id_pembeli' => $this->id_pembeli
        ];
    }
}
