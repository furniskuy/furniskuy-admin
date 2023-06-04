<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PembeliResource extends JsonResource
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
            'id_user' => $this->id_user,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            'tanggal_lahir' => $this->tanggal_lahir,
            'pembeli_baru' => $this->pembeli_baru,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
