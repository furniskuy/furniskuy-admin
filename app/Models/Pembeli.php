<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Pembeli",
 *      required={"pembeli_baru"},
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="jenis_kelamin",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="pembeli_baru",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="boolean",
 *      )
 * )
 */class Pembeli extends Model
{
    public $table = 'pembeli';

    public $fillable = [
        'nama',
        'jenis_kelamin',
        'pembeli_baru'
    ];

    protected $casts = [
        'nama' => 'string',
        'jenis_kelamin' => 'string',
        'pembeli_baru' => 'boolean'
    ];

    public static array $rules = [
        'nama' => 'nullable|string|max:50',
        'jenis_kelamin' => 'nullable|string|max:1',
        'pembeli_baru' => 'required|boolean'
    ];

    public function transaksis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Transaksi::class, 'id_pembeli');
    }
}
