<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|string|max:255',
            'paternal_lastname' => 'required|string|max:255',
            'maternal_lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|integer|unique:users',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser una cadena de texto',
            'name.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'paternal_lastname.required' => 'El campo apellido paterno es requerido',
            'paternal_lastname.string' => 'El campo apellido paterno debe ser una cadena de texto',
            'paternal_lastname.max' => 'El campo apellido paterno debe tener un máximo de 255 caracteres',
            'maternal_lastname.required' => 'El campo apellido materno es requerido',
            'maternal_lastname.string' => 'El campo apellido materno debe ser una cadena de texto',
            'maternal_lastname.max' => 'El campo apellido materno debe tener un máximo de 255 caracteres',
            'birthdate.required' => 'El campo fecha de nacimiento es requerido',
            'birthdate.date' => 'El campo fecha de nacimiento debe ser una fecha',
            'gender.required' => 'El campo género es requerido',
            'gender.string' => 'El campo género debe ser una cadena de texto',
            'gender.max' => 'El campo género debe tener un máximo de 255 caracteres',
            'address.required' => 'El campo dirección es requerido',
            'address.string' => 'El campo dirección debe ser una cadena de texto',
            'address.max' => 'El campo dirección debe tener un máximo de 255 caracteres',
            'phone.required' => 'El campo teléfono es requerido',
            'phone.numeric' => 'El campo teléfono debe ser un número',
            'phone.unique' => 'El teléfono ya está en uso',
            'role.required' => 'El campo rol es requerido',
            'role.string' => 'El campo rol debe ser una cadena de texto',
            'role.max' => 'El campo rol debe tener un máximo de 255 caracteres',
            'email.required' => 'El campo correo electrónico es requerido',
            'email.string' => 'El campo correo electrónico debe ser una cadena de texto',
            'email.email' => 'El campo correo electrónico debe ser un correo electrónico',
            'email.max' => 'El campo correo electrónico debe tener un máximo de 255 caracteres',
            'email.unique' => 'El correo electrónico ya está en uso',
            'password.required' => 'El campo contraseña es requerido',
            'password.string' => 'El campo contraseña debe ser una cadena de texto',
            'password_confirmation.required' => 'El campo confirmar contraseña es requerido',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
            'password_confirmation.string' => 'El campo confirmar contraseña debe ser una cadena de texto',
        ];
    }
}
