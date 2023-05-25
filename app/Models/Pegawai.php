<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Pegawai",
 *      required={},
 *      @OA\Property(
 *          property="tanggal_lahir",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="jenis_kelamin",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      )
 * )
 */class Pegawai extends Model
{
    public $table = 'pegawai';

    public $fillable = [
        'tanggal_lahir',
        'jenis_kelamin',
        'nama'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'jenis_kelamin' => 'string',
        'nama' => 'string'
    ];

    public static array $rules = [
        'tanggal_lahir' => 'nullable',
        'jenis_kelamin' => 'nullable|string|max:1',
        'nama' => 'nullable|string|max:50'
    ];

    public function ekspedisis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Ekspedisi::class, 'id_pegawai');
    }

    public function transaksis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Transaksi::class, 'id_pegawai');
    }
}
