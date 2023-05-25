<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="BarangMasuk",
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
 *      )
 * )
 */class BarangMasuk extends Model
{
    public $table = 'barang_masuk';

    public $fillable = [
        'jumlah',
        'harga',
        'nama',
        'tanggal',
        'id_inventaris',
        'id_supplier'
    ];

    protected $casts = [
        'nama' => 'string',
        'tanggal' => 'date'
    ];

    public static array $rules = [
        'jumlah' => 'nullable',
        'harga' => 'nullable',
        'nama' => 'nullable|string|max:50',
        'tanggal' => 'nullable',
        'id_inventaris' => 'nullable',
        'id_supplier' => 'nullable'
    ];

    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'id_supplier');
    }
}
