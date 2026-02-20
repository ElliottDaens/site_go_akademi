<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'email' => 'required|email',
            'subject' => 'required|min:3|max:200',
            'message' => 'required|min:10|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis.',
            'name.min' => 'Le nom doit contenir au moins 2 caractères.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email n\'est pas valide.',
            'subject.required' => 'Le sujet est requis.',
            'message.required' => 'Le message est requis.',
            'message.min' => 'Le message doit contenir au moins 10 caractères.',
        ];
    }
}
