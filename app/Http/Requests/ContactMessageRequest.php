<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|min:2|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'sometimes|nullable|string|max:50',
            'service'     => 'sometimes|nullable|string|max:100',
            'country'     => 'sometimes|nullable|string|max:100',
            'nationality' => 'sometimes|nullable|string|max:100',
            'message'     => 'required|string|min:20',
            'consent'     => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Please enter your full name.',
            'name.min'         => 'Name must be at least 2 characters.',
            'email.required'   => 'Please enter a valid email address.',
            'email.email'      => 'Please enter a valid email address.',
            'message.required' => 'Please write your message.',
            'message.min'      => 'Message must be at least 20 characters.',
            'consent.accepted' => 'You must agree before submitting.',
        ];
    }
}
