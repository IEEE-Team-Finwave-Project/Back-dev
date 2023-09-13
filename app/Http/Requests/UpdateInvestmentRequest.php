<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvestmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'=>'string',
            'price'=>'numeric',
            'image'=>'file|mimes:jpeg,png,jpg,gif,svg',
            'user_id'=>'exists:users,id',
        ];
    }
}
