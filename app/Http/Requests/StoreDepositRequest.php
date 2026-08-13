<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDepositRequest extends FormRequest {

    public function authorize() : bool {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules() : array {
        return [
            'coin_id' => ['nullable', 'integer', 'exists:coins,id'],
            'quantity' => ['nullable', 'integer', 'gt:0'],
            'value_cents' => ['required', 'integer', 'gt:0'],
        ];
    }
    
}
