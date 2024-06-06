<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenaliteRequest extends FormRequest
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
            'etape' => 'required',
            'equipe' => 'required',
            'penalite' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'etape.required' => 'Le champ 2tape est obligatoire.',
            'equipe.required' => 'Le champ équipe est obligatoire.',
            'penalite.required' => 'Le champ p2nalite est obligatoire.'
        ];
    }
}
