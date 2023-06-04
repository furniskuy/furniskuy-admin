<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Kategori",
 *      required={"nama_kategori","slug_kategori","tags"},
 *      @OA\Property(
 *          property="nama_kategori",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="slug_kategori",
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
 *      )
 * )
 */class Kategori extends Model
{
    public $table = 'kategori';

    public $fillable = [
        'nama_kategori',
        'slug_kategori',
        'tags'
    ];

    protected $casts = [
        'nama_kategori' => 'string',
        'slug_kategori' => 'string',
        'tags' => 'string'
    ];

    public static array $rules = [
        'nama_kategori' => 'required|string|max:255',
        'slug_kategori' => 'required|string|max:255',
        'tags' => 'required|string'
    ];

    public function inventaris(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Inventari::class, 'id_kategori');
    }
}
