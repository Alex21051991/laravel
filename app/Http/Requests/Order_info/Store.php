<?php

namespace App\Http\Requests\Order_info;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'phone' => ['nullable', 'string', 'min:10', 'max:50'],
            'email' => ['required', 'string', 'min:6', 'max:50'],
            'info' => ['nullable', 'string', 'min:3', 'max:250']
        ];
    }
}
