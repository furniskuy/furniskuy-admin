<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Keranjang",
 *      required={"id_barang","id_pembeli","harga","jumlah"},
 
 * )
 */class Keranjang extends Model
{
    public $table = 'keranjang';

    public $fillable = [
        'id_barang',
        'id_pembeli',
        'harga',
        'jumlah'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'id_barang' => 'required',
        'id_pembeli' => 'required',
        'harga' => 'required',
        'jumlah' => 'required'
    ];

    
}
