<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Supplier",
 *      required={"nama_supplier","alamat"},
 *      @OA\Property(
 *          property="nama_supplier",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="alamat",
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
 */class Supplier extends Model
{
    public $table = 'supplier';

    public $fillable = [
        'nama_supplier',
        'alamat'
    ];

    protected $casts = [
        'nama_supplier' => 'string',
        'alamat' => 'string'
    ];

    public static array $rules = [
        'nama_supplier' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function inventaris(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Inventari::class, 'id_supplier');
    }
}
