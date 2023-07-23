<?php

declare(strict_types=1);

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'categories' => ['required', 'array'],
            //проверяем что в массиве категорий. Должны быть только существующие из базы, проверка по полю id
            'categories.*' => ['exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'author' => ['nullable', 'string', 'min:2', 'max:50'],
            'image' => ['someting'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'description' => ['nullable', 'string', 'max:250']
        ];
    }

    public function getCategories(): array
    {
        return $this->validated('categories');
    }
}
