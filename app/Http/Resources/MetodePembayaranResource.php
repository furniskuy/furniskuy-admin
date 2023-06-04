<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MetodePembayaranResource extends JsonResource
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
            'logo' => $this->logo,
            'nama_bank' => $this->nama_bank,
            'no_rek' => $this->no_rek,
            'atas_nama' => $this->atas_nama,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
