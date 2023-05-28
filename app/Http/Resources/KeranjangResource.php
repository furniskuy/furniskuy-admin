<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeranjangResource extends JsonResource
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
            'id_barang' => $this->id_barang,
            'id_pembeli' => $this->id_pembeli,
            'harga' => $this->harga,
            'jumlah' => $this->jumlah
        ];
    }
}
