<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'information_id' => 'required|integer|exists:information,id',
            'category' => 'required',
            'percent' => 'required|integer|min:0|max:100',
        ];
    }
}
