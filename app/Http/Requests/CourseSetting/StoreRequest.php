<?php

namespace App\Http\Requests\CourseSetting;

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
            'parallel' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            'parallel.required' => 'El paralelo es requerido',
            'degree.required' => 'El grado es requerido',
            'level.required' => 'El nivel es requerido',
        ];
    }
}
