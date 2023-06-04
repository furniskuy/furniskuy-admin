<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Keranjang",
 *      required={"id_barang","id_pembeli","jumlah"},
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */ class Keranjang extends Model
{
    public $table = 'keranjang';

    public $fillable = [
        'id_barang',
        'id_pembeli',
        'jumlah',
        'selected'
    ];

    protected $casts = [];

    public static array $rules = [
        'id_barang' => 'required',
        'id_pembeli' => 'required',
        'jumlah' => 'required',
        'selected' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public $with = ['barang'];

    public function barang()
    {
        return $this->hasOne(Inventaris::class, 'id', 'id_barang');
    }
}
