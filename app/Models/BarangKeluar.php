<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="BarangKeluar",
 *      required={},
 *      @OA\Property(
 *          property="tanggal",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date"
 *      )
 * )
 */class BarangKeluar extends Model
{
    public $table = 'barang_keluar';

    public $fillable = [
        'jumlah',
        'harga',
        'tanggal',
        'id_inventaris'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

    public static array $rules = [
        'jumlah' => 'nullable',
        'harga' => 'nullable',
        'tanggal' => 'nullable',
        'id_inventaris' => 'nullable'
    ];

    public function idInventaris(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Inventari::class, 'id_inventaris');
    }
}
