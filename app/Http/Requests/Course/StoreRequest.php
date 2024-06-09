<?php

namespace App\Http\Requests\Course;

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
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'course_setting_id' => 'required|exists:course_settings,id',
        ];
    }

    public function messages(): array{
        return [
            'teacher_id.required' => 'El campo profesor es requerido',
            'teacher_id.exists' => 'El profesor seleccionado no existe',
            'subject_id.required' => 'El campo materia es requerido',
            'subject_id.exists' => 'La materia seleccionada no existe',
            'course_setting_id.required' => 'El campo configuración de curso es requerido',
            'course_setting_id.exists' => 'La configuración de curso seleccionada no existe',
        ];
    }
}
