<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignInAuthRequest extends FormRequest
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
            'codigo' => 'required|string|max:200',
            'clave' => 'required|string|max:200',
        ];
    }

    
    public function messages()
    {
        return [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.string' => 'El código debe tener un formato válido.',
            'codigo.max' => 'El código debe tener un maximo de 200 caracteres.',
            'clave.required' => 'La clave es obligatoria.',
            'clave.string' => 'La clave debe tener un formato válido.',
            'clave.max' => 'La clave debe tener un maximo de 200 caracteres.',
        ];
    }

}
