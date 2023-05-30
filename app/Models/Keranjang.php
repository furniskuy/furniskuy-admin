<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Keranjang",
 *   required={},
 *   @OA\Property(
 *     property="id",
 *     type="integer",
 *     format="int32",
 *     readOnly=true
 *   ),
 *   @OA\Property(
 *     property="id_barang",
 *     type="integer",
 *     format="int32"
 *   ),
 *   @OA\Property(
 *     property="id_pembeli",
 *     type="integer",
 *     format="int32"
 *   ),
 *   @OA\Property(
 *     property="harga",
 *     type="integer",
 *     format="int32"
 *   ),
 *   @OA\Property(
 *     property="jumlah",
 *     type="integer",
 *     format="int32"
 *   ),
 *   @OA\Property(
 *     property="barang",
 *     type="object",
 *     readOnly=true,
 *     allOf={
 *       @OA\Schema(
 *          ref="#/components/schemas/Inventaris"
 *       )
 *     }
 *   )
 * )
 */
class Keranjang extends Model
{
    public $table = 'keranjang';

    public $fillable = [
        'id_barang',
        'id_pembeli',
        'harga',
        'jumlah'
    ];

    public $with = array('barang');

    public static array $rules = [
        'id_barang' => 'required',
        'id_pembeli' => 'required',
        'harga' => 'required',
        'jumlah' => 'required'
    ];

    public function barang()
    {
        return $this->hasOne(Inventaris::class, 'id', 'id_barang');
    }
}
