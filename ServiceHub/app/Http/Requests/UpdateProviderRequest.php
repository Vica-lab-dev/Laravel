<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "sometimes|string|max:255",
            "description" => "sometimes|string|max:5000",
            "phone" => "sometimes|string|max:30",
            "address" => "sometimes|string|max:255",
            "city" => "sometimes|string|max:255",
            "latitude" => "sometimes|numeric|min:-90|max:90",
            "longitude" => "sometimes|numeric|min:-180|max:180",
        ];
    }
}
