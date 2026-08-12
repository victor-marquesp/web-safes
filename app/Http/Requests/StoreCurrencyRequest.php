<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest {

    public function authorize() : bool {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules() : array {

        return [
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['required', 'image', 'max:10240'],
            'description' => ['nullable', 'string', 'max:255']
        ];

    }
}
