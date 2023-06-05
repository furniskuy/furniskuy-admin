<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Inventaris",
 *      required={"nama","jumlah","harga","deskripsi","foto","id_user","id_kategori","id_supplier","tags"},
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="deskripsi",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="foto",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="tags",
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
 */ class Inventaris extends Model
{
    public $table = 'inventaris';

    public $fillable = [
        'nama',
        'jumlah',
        'harga',
        'deskripsi',
        'foto',
        'id_user',
        'id_kategori',
        'id_supplier',
        'tags'
    ];

    protected $casts = [
        'nama' => 'string',
        'deskripsi' => 'string',
        'foto' => 'string',
        'tags' => 'string'
    ];

    public static array $rules = [
        'nama' => 'required|string|max:255',
        'jumlah' => 'required',
        'harga' => 'required',
        'deskripsi' => 'required|string',
        'id_user' => 'required',
        'id_kategori' => 'required',
        'id_supplier' => 'required',
        'tags' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function idKategori(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'id_kategori');
    }

    public function idSupplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'id_supplier');
    }

    public function idUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user');
    }

    public function ratings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Rating::class, 'id_inventaris');
    }

    public function transaksiBarangs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\TransaksiBarang::class, 'id_inventaris');
    }
}
