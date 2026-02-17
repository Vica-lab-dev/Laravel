<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:64',
            'author' => 'required|string|min:1|max:64',
            'description' => 'required|string|min:1|max:248',
            'content' => 'required|string',
            'price' => 'required|numeric|min:1',
            'image' => 'required|mimes:jpeg,jpg,png,webp|max:4096',
            'pdf' => 'required|mimes:pdf|max:4096',
        ];
    }
}
