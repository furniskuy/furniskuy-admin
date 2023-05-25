<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EkspedisiResource extends JsonResource
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
            'tanggal' => $this->tanggal,
            'alamat' => $this->alamat,
            'jumlah' => $this->jumlah,
            'id_pegawai' => $this->id_pegawai
        ];
    }
}
