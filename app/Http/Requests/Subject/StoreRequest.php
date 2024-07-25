<?php

namespace App\Http\Requests\Subject;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:subjects',
            'code' => 'required|string|unique:subjects',
            'knowledge' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser un texto',
            'name.unique' => 'El nombre ya está en uso',
            'code.required' => 'El código es requerido',
            'code.string' => 'El código debe ser un texto',
            'code.unique' => 'El código ya está en uso',
            'knowledge.required' => 'El conocimiento es requerido',
            'knowledge.string' => 'El conocimiento debe ser un texto',
            'knowledge.max' => 'El conocimiento no debe exceder los 255 caracteres',
        ];
    }
}
