<?php

namespace App\Http\Requests\Parallel;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:1|unique:parallels,name',
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser un texto',
            'name.max' => 'El nombre no debe exceder el caracter',
            'name.unique' => 'El nombre ya existe',
        ];
    }
}
