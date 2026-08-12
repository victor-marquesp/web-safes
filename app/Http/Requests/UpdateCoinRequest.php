<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCoinRequest extends FormRequest
{

    public function authorize() : bool {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'value_cents' => ['required', 'integer', 'min:0'],
            'icon' => ['nullable', 'image', 'max:10240']
        ];
    }
}
