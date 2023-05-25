<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Supplier",
 *      required={},
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="alamat",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      )
 * )
 */class Supplier extends Model
{
    public $table = 'supplier';

    public $fillable = [
        'nama',
        'alamat'
    ];

    protected $casts = [
        'nama' => 'string',
        'alamat' => 'string'
    ];

    public static array $rules = [
        'nama' => 'nullable|string|max:50',
        'alamat' => 'nullable|string|max:50'
    ];

    public function barangMasuks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\BarangMasuk::class, 'id_supplier');
    }

    public function inventaris(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Inventari::class, 'id_supplier');
    }
}
