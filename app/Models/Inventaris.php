<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Inventaris",
 *      required={},
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="last_updt",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      )
 * )
 */class Inventaris extends Model
{
    public $table = 'inventaris';

    public $fillable = [
        'nama',
        'jumlah',
        'harga',
        'last_updt',
        'id_supplier',
        'image'
    ];

    protected $casts = [
        'nama' => 'string',
        'last_updt' => 'string'
    ];

    public static array $rules = [
        'nama' => 'nullable|string|max:50',
        'jumlah' => 'nullable',
        'harga' => 'nullable',
        'last_updt' => 'nullable|string|max:100',
        'id_supplier' => 'nullable',
        'image' => 'nullable|string|max:100'
    ];

    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'id_supplier');
    }

    public function barangKeluars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\BarangKeluar::class, 'id_inventaris');
    }
}
