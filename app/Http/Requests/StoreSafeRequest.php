<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSafeRequest extends FormRequest {

    public function authorize() : bool {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules() : array {

        return [
            'name' => ['required', 'string', 'max:100'],
            'animal_id' => ['required', 'integer', 'exists:animals,id'],
            'currency_id' => ['required', 'integer', 'exists:currencies,id'],
            'description' => ['nullable', 'string', 'max:255']
        ];
        
    }

}
