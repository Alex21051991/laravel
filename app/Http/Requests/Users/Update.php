<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'email' => ['nullable', 'string', 'min:6', 'max:50', 'unique:users,email'],
           // Rule::unique('users')->ignore($user->id), игнорировать емайл для существующего пользователя
            'currentPassword' => ['nullable'],
            'password' => ['nullable'],
            'password-conform' => ['nullable'],
            'isAdmin' => ['nullable', 'boolean'],
        ];
    }
}
