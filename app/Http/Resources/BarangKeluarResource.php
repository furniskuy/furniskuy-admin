<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangKeluarResource extends JsonResource
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
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'tanggal' => $this->tanggal,
            'id_inventaris' => $this->id_inventaris
        ];
    }
}
