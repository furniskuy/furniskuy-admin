<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Rating",
 *      required={"rating","id_user","id_barang","review"},
 *      @OA\Property(
 *          property="review",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      )
 * )
 */class Rating extends Model
{
    public $table = 'rating';

    public $fillable = [
        'rating',
        'id_user',
        'id_barang',
        'review'
    ];

    protected $casts = [
        'review' => 'string'
    ];

    public static array $rules = [
        'rating' => 'required',
        'id_user' => 'required',
        'id_barang' => 'required',
        'review' => 'required|string|max:65535'
    ];

    
}
