<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "description" => "required|string|max:5000",
            "phone" => "required|string|max:30",
            "address" => "required|string|max:255",
            "city" => "required|string|max:255",
            "latitude" => "required|numeric|min:-90|max:90",
            "longitude" => "required|numeric|min:-180|max:180",
        ];
    }
}
