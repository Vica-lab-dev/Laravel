<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "sometimes|string|max:32",
            "slug" => ["sometimes","string","max:64", Rule::unique(table: 'categories',column: 'slug')->ignore($this->category)],
            "description" => "sometimes|string|max:5000",
        ];
    }
}
