<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeroulementRequest extends FormRequest
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
            'coureur' => 'required',
            'arrive' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'coureur.required' => 'Le champ coureur est obligatoire.',
            'arrive.required' => 'Le champ arrivé est vide.'
        ];
    }
}
