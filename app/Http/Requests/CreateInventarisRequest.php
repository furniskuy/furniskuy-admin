<?php

namespace App\Http\Requests;

use App\Models\Inventaris;
use Illuminate\Foundation\Http\FormRequest;

class CreateInventarisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Inventaris::$rules;
    }
}
