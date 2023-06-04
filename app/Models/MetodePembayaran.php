<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="MetodePembayaran",
 *      required={"logo","nama_bank","no_rek","atas_nama"},
 *      @OA\Property(
 *          property="logo",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="nama_bank",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="no_rek",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="atas_nama",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
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
 */class MetodePembayaran extends Model
{
    public $table = 'metode_pembayaran';

    public $fillable = [
        'logo',
        'nama_bank',
        'no_rek',
        'atas_nama'
    ];

    protected $casts = [
        'logo' => 'string',
        'nama_bank' => 'string',
        'no_rek' => 'string',
        'atas_nama' => 'string'
    ];

    public static array $rules = [
        'logo' => 'required|string|max:255',
        'nama_bank' => 'required|string|max:255',
        'no_rek' => 'required|string|max:255',
        'atas_nama' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
