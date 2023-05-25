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
            'id_pegawai' => $this->id_pegawai,
            'id_kasir' => $this->id_kasir,
            'id_pembeli' => $this->id_pembeli,
            'tanggal' => $this->tanggal,
            'id_barang' => $this->id_barang,
            'terbayar' => $this->terbayar,
            'harga' => $this->harga,
            'jumlah' => $this->jumlah
        ];
    }
}
