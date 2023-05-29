<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// OA\Property from fillable, hide id from request
/**
 * @OA\Schema(
 *      schema="Inventaris",
 *      required={},
 *      @OA\Property(
 *          property="id",
 *          type="integer",
 *          format="int32",
 *          readOnly=true
 *     ),
 *      @OA\Property(
 *          property="nama",
 *          type="string",
 *          maxLength=50
 *      ),
 *      @OA\Property(
 *          property="jumlah",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="harga",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="id_supplier",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="image",
 *          type="string",
 *          maxLength=255
 *      ),
 * )
 */ class Inventaris extends Model
{
    public $table = 'inventaris';

    public $timestamps = false;

    public $fillable = [
        'nama',
        'jumlah',
        'harga',
        'id_supplier',
        'image'
    ];

    public static array $rules = [
        'nama' => 'nullable|string|max:50',
        'jumlah' => 'nullable',
        'harga' => 'nullable',
        'id_supplier' => 'nullable',
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
