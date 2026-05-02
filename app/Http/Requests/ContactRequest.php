<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'hero_title'   => 'required|string|max:255',
            'hero_desc'    => 'sometimes|nullable|string',

            'phone'         => 'sometimes|nullable|string|max:50',
            'email'         => 'sometimes|nullable|email|max:255',
            'address'       => 'sometimes|nullable|string|max:255',
            'working_hours' => 'sometimes|nullable|string',

            'social_fb' => 'sometimes|nullable|string|max:255',
            'social_ig' => 'sometimes|nullable|string|max:255',
            'social_wa' => 'sometimes|nullable|string|max:50',

            'faq'               => 'sometimes|nullable|array',
            'faq.*.question'    => 'required_with:faq.*|string|max:500',
            'faq.*.answer'      => 'sometimes|nullable|string',

            'map_src' => 'sometimes|nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'required'             => 'The :attribute field is required.',
            'max'                  => 'The :attribute may not be greater than :max characters.',
            'email'                => 'The :attribute must be a valid email address.',
            'url'                  => 'The :attribute must be a valid URL.',
            'faq.*.question.required_with' => 'Each FAQ item must have a question.',
        ];
    }
}
