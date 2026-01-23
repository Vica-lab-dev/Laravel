<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class informationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'country' => 'required|string',
        ];
    }
}
