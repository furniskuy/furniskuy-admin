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
            'deskripsi' => $this->deskripsi,
            'foto' => $this->foto,
            'id_user' => $this->id_user,
            'id_kategori' => $this->id_kategori,
            'id_supplier' => $this->id_supplier,
            'tags' => $this->tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
