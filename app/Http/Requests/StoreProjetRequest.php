<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'lien_demo' => 'nullable|url|max:500',
            'lien_github' => 'nullable|url|max:500',
            'tags' => 'nullable|string|max:500',
            'ordre' => 'nullable|integer|min:0',
            'visible' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'titre.required' => 'Le titre est obligatoire.',
        ];
    }
}
