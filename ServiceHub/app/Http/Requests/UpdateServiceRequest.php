<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "sometimes|string|min:3|max:64",
            "description" => "sometimes|string|min:10|max:500",
            "price" => "sometimes|integer|min:0",
            "duration" => "sometimes|integer|min:1",
        ];
    }
}
