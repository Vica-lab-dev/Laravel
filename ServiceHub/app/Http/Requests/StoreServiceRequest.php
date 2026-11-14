<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|min:3|max:64",
            "description" => "required|string|min:10|max:500",
            "price" => "required|integer|min:0",
            "duration" => "required|integer|min:1",
            "category_ids" => "required|array|min:1",
            "category_ids.*" => "integer|exists:categories,id",
        ];
    }
}
