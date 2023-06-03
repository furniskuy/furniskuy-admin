<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Pegawai",
 *      required={},
 *      @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int32",
 *         readOnly=true
 *      ),
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),,
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
 *      )
 * )
 */ class Pegawai extends Model
{
    public $table = 'pegawai';

    public $fillable = [
        'id',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'jenis_kelamin' => 'string',
        'nama' => 'string'
    ];

    public static array $rules = [
        'id' => 'integer',
        'nama' => 'nullable|string|max:50',
        'tanggal_lahir' => 'nullable',
        'jenis_kelamin' => 'nullable|string|max:1',
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
