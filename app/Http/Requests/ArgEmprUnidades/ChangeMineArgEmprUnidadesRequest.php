<?php

namespace App\Http\Requests\ArgEmprUnidades;

use Illuminate\Foundation\Http\FormRequest;

class ChangeMineArgEmprUnidadesRequest extends FormRequest
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
            'id' => 'required|integer|exists:arg_empr_unidades,unidad_id',
            'nombre' => 'required|string|max:200',
        ];
    }
}
