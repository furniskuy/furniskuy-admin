<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventarisResource extends JsonResource
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
            'nama' => $this->nama,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'last_updt' => $this->last_updt,
            'id_supplier' => $this->id_supplier
        ];
    }
}
