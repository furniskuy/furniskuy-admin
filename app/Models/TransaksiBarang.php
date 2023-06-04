<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="TransaksiBarang",
 *      required={"id_inventaris","id_transaksi","jumlah"},
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
 */ class TransaksiBarang extends Model
{
    public $table = 'transaksi_barang';

    public $fillable = [
        'id_inventaris',
        'id_transaksi',
        'jumlah'
    ];

    protected $casts = [];

    public static array $rules = [
        'id_inventaris' => 'required',
        'id_transaksi' => 'required',
        'jumlah' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function inventaris(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Inventari::class, 'id_inventaris');
    }

    public function transaksi(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Transaksi::class, 'id_transaksi');
    }
}
