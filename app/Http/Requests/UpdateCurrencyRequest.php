<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrencyRequest extends FormRequest {

    public function authorize() : bool {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules() : array {
        
        return [
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['nullable', 'image', 'max:10240'],
            'description' => ['nullable', 'string', 'max:255']
        ];
    }
}
