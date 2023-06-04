<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Ekspedisi",
 *      required={"nama_ekspedisi","alamat","no_hp","email","website","logo"},
 *      @OA\Property(
 *          property="nama_ekspedisi",
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
 *          property="no_hp",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="email",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="website",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="logo",
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
 */class Ekspedisi extends Model
{
    public $table = 'ekspedisi';

    public $fillable = [
        'nama_ekspedisi',
        'alamat',
        'no_hp',
        'email',
        'website',
        'logo'
    ];

    protected $casts = [
        'nama_ekspedisi' => 'string',
        'alamat' => 'string',
        'no_hp' => 'string',
        'email' => 'string',
        'website' => 'string',
        'logo' => 'string'
    ];

    public static array $rules = [
        'nama_ekspedisi' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'website' => 'required|string|max:255',
        'logo' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
