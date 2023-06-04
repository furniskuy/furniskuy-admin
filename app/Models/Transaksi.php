<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Transaksi",
 *      required={"tanggal_transaksi","total_harga","total_barang","status","status_transaksi","id_pembeli"},
 *      @OA\Property(
 *          property="tanggal_transaksi",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="status_transaksi",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="tenggat_waktu",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="waktu_pembayaran",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="waktu_pengiriman",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
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
 */ class Transaksi extends Model
{
    public $table = 'transaksi';

    public $fillable = [
        'tanggal_transaksi',
        'total_harga',
        'total_barang',
        'status',
        'status_transaksi',
        'tenggat_waktu',
        'metode_pembayaran',
        'waktu_pembayaran',
        'waktu_pengiriman',
        'id_pembeli'
    ];

    protected $casts = [
        'tanggal_transaksi' => 'string',
        'status_transaksi' => 'string',
        'tenggat_waktu' => 'string',
        'waktu_pembayaran' => 'string',
        'waktu_pengiriman' => 'string'
    ];

    public static array $rules = [
        'id_pembeli' => 'required',
        'tanggal_transaksi' => 'required|default:now()',
        'total_harga' => 'required',
        'total_barang' => 'required',
        'status' => 'required',
        'status_transaksi' => 'required|string|max:255',
        'tenggat_waktu' => 'nullable',
        'metode_pembayaran' => 'nullable',
        'waktu_pembayaran' => 'nullable',
        'waktu_pengiriman' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_pembeli' => 'required'
    ];

    public $with = ['listBarang'];

    public function pembeli(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'id_pembeli');
    }

    public function listBarang()
    {
        return $this->belongsToMany(\App\Models\Inventaris::class, 'transaksi_barang', 'id_transaksi', 'id_inventaris')->withPivot('jumlah');
    }
}
