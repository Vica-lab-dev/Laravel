<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'newName' => 'required|string|max:255',
            'newDescription' => 'required|string|max:255',
            'newURL' => 'required|string|max:255',
        ];
    }
}
