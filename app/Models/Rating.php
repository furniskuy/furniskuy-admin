<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Rating",
 *      required={"rating","id_user","id_inventaris","review"},
 *      @OA\Property(
 *          property="review",
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
 */class Rating extends Model
{
    public $table = 'rating';

    public $fillable = [
        'rating',
        'id_user',
        'id_inventaris',
        'review'
    ];

    protected $casts = [
        'review' => 'string'
    ];

    public static array $rules = [
        'rating' => 'required',
        'id_user' => 'required',
        'id_inventaris' => 'required',
        'review' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function idInventaris(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Inventari::class, 'id_inventaris');
    }

    public function idUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user');
    }
}
