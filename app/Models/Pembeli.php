<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Pembeli",
 *      required={"nama","jenis_kelamin","no_hp","alamat","tanggal_lahir","pembeli_baru"},
 *      @OA\Property(
 *          property="nama",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="jenis_kelamin",
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
 *          property="alamat",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="tanggal_lahir",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="pembeli_baru",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="boolean",
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
 */ class Pembeli extends Model
{
    public $table = 'pembeli';

    public $fillable = [
        'id_user',
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'tanggal_lahir',
        'pembeli_baru'
    ];

    protected $casts = [
        'nama' => 'string',
        'jenis_kelamin' => 'string',
        'no_hp' => 'string',
        'alamat' => 'string',
        'tanggal_lahir' => 'date',
        'pembeli_baru' => 'boolean'
    ];

    public static array $rules = [
        'id_user' => 'required',
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:1',
        'no_hp' => 'required|string|max:13',
        'alamat' => 'required|string|max:255',
        'tanggal_lahir' => 'required',
        'pembeli_baru' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
}
