<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *     schema="User",
 *     required={},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int32",
 *         readOnly=true
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="email_verified_at",
 *         type="string",
 *         format="date-time",
 *         readOnly=true
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         format="password"
 *     ),
 *     @OA\Property(
 *         property="remember_token",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         readOnly=true
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         readOnly=true
 *     ),
 *     @OA\Property(
 *         property="pembeli",
 *         type="object",
 *         readOnly=true,
 *         allOf={
 *             @OA\Schema(
 *                 ref="#/components/schemas/Pembeli"
 *             )
 *         }
 *     ),
 *     @OA\Property(
 *         property="pegawai",
 *         type="object",
 *         readOnly=true,
 *         allOf={
 *             @OA\Schema(
 *                 ref="#/components/schemas/Pegawai"
 *             )
 *         }
 *     )
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pembeli(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Pembeli::class, 'id');
    }

    public function pegawai(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Pegawai::class, 'id');
    }
}
