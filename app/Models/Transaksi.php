<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Transaksi",
 *      required={},
 *      @OA\Property(
 *          property="tanggal",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="terbayar",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      )
 * )
 */class Transaksi extends Model
{
    public $table = 'transaksi';

    public $fillable = [
        'id_pegawai',
        'id_kasir',
        'id_pembeli',
        'tanggal',
        'id_barang',
        'terbayar',
        'harga',
        'diskon',
        'jumlah',
        'status',
        'status_transaksi'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'terbayar' => 'string'
    ];

    public static array $rules = [
        'id_pegawai' => 'nullable',
        'id_kasir' => 'nullable',
        'id_pembeli' => 'nullable',
        'tanggal' => 'nullable',
        'id_barang' => 'nullable',
        'terbayar' => 'nullable|string|max:50',
        'harga' => 'nullable',
        'jumlah' => 'nullable'
    ];

    public function pegawai(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Pegawai::class, 'id_pegawai');
    }

    public function pembeli(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Pembeli::class, 'id_pembeli');
    }

    // public function total(): int
    // {
    //     $total = $this->harga;

    //     if ($this->diskon != 0) {
    //         $total = $this->harga * $this->diskon;
    //     }

    //     if ($this->diskonCoret != 0) {
    //         $total = $this->harga - $this->diskonCoret;
    //     }

    //    return $total;
    // }
}
