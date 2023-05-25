<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Ekspedisi",
 *      required={},
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="tanggal",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="alamat",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      )
 * )
 */class Ekspedisi extends Model
{
    public $table = 'ekspedisi';

    public $fillable = [
        'nama',
        'tanggal',
        'alamat',
        'jumlah',
        'id_pegawai'
    ];

    protected $casts = [
        'nama' => 'string',
        'tanggal' => 'date',
        'alamat' => 'string'
    ];

    public static array $rules = [
        'nama' => 'nullable|string|max:50',
        'tanggal' => 'nullable',
        'alamat' => 'nullable|string|max:100',
        'jumlah' => 'nullable',
        'id_pegawai' => 'nullable'
    ];

    public function idPegawai(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Pegawai::class, 'id_pegawai');
    }
}
