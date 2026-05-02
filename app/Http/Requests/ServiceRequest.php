<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // ADMISSION
            'admission_label' => 'required|string|max:100',
            'admission_title' => 'required|string|max:255',
            'admission_description' => 'nullable|string',

            'admission_feature1_title' => 'required|string|max:255',
            'admission_feature1_text' => 'nullable|string',
            'admission_feature2_title' => 'required|string|max:255',
            'admission_feature2_text' => 'nullable|string',
            'admission_feature3_title' => 'required|string|max:255',
            'admission_feature3_text' => 'nullable|string',

            'admission_button_text' => 'required|string|max:100',
            'admission_button_link' => 'required|string|max:255',

            'admission_step1_title' => 'required|string|max:255',
            'admission_step1_text' => 'nullable|string|max:500',
            'admission_step2_title' => 'required|string|max:255',
            'admission_step2_text' => 'nullable|string|max:500',
            'admission_step3_title' => 'required|string|max:255',
            'admission_step3_text' => 'nullable|string|max:500',

            // AIRPORT
            'airport_label' => 'required|string|max:100',
            'airport_title' => 'required|string|max:255',
            'airport_description' => 'nullable|string',

            'airport_feature1_title' => 'required|string|max:255',
            'airport_feature1_text' => 'nullable|string',
            'airport_feature2_title' => 'required|string|max:255',
            'airport_feature2_text' => 'nullable|string',
            'airport_feature3_title' => 'required|string|max:255',
            'airport_feature3_text' => 'nullable|string',

            'airport_button_text' => 'required|string|max:100',
            'airport_button_link' => 'required|string|max:255',

            'airport_included1_icon' => 'nullable|string|max:100',
            'airport_included1_text' => 'required|string|max:255',
            'airport_included2_icon' => 'nullable|string|max:100',
            'airport_included2_text' => 'required|string|max:255',
            'airport_included3_icon' => 'nullable|string|max:100',
            'airport_included3_text' => 'required|string|max:255',
            'airport_included4_icon' => 'nullable|string|max:100',
            'airport_included4_text' => 'required|string|max:255',

            // ACCOMMODATION
            'accommodation_label' => 'required|string|max:100',
            'accommodation_title' => 'required|string|max:255',
            'accommodation_description' => 'nullable|string',

            'accommodation_feature1_title' => 'required|string|max:255',
            'accommodation_feature1_text' => 'nullable|string',
            'accommodation_feature2_title' => 'required|string|max:255',
            'accommodation_feature2_text' => 'nullable|string',
            'accommodation_feature3_title' => 'required|string|max:255',
            'accommodation_feature3_text' => 'nullable|string',

            'accommodation_button_text' => 'required|string|max:100',
            'accommodation_button_link' => 'required|string|max:255',

            'housing_option1_icon' => 'nullable|string|max:100',
            'housing_option1_title' => 'required|string|max:255',
            'housing_option1_subtitle' => 'nullable|string|max:500',
            'housing_option1_popular' => 'boolean',
            'housing_option2_icon' => 'nullable|string|max:100',
            'housing_option2_title' => 'required|string|max:255',
            'housing_option2_subtitle' => 'nullable|string|max:500',
            'housing_option2_popular' => 'boolean',
            'housing_option3_icon' => 'nullable|string|max:100',
            'housing_option3_title' => 'required|string|max:255',
            'housing_option3_subtitle' => 'nullable|string|max:500',
            'housing_option3_popular' => 'boolean',
            'housing_option4_icon' => 'nullable|string|max:100',
            'housing_option4_title' => 'required|string|max:255',
            'housing_option4_subtitle' => 'nullable|string|max:500',
            'housing_option4_popular' => 'boolean',

            // CONSULTATION
            'consultation_label' => 'required|string|max:100',
            'consultation_title' => 'required|string|max:255',
            'consultation_subtitle' => 'nullable|string',

            'consultation_card1_icon' => 'nullable|string|max:100',
            'consultation_card1_title' => 'required|string|max:255',
            'consultation_card1_text' => 'nullable|string',
            'consultation_card2_icon' => 'nullable|string|max:100',
            'consultation_card2_title' => 'required|string|max:255',
            'consultation_card2_text' => 'nullable|string',
            'consultation_card3_icon' => 'nullable|string|max:100',
            'consultation_card3_title' => 'required|string|max:255',
            'consultation_card3_text' => 'nullable|string',
            'consultation_card4_icon' => 'nullable|string|max:100',
            'consultation_card4_title' => 'required|string|max:255',
            'consultation_card4_text' => 'nullable|string',

            // CTA
            'cta_title' => 'required|string|max:255',
            'cta_subtitle' => 'nullable|string|max:500',
            'cta_button_text' => 'required|string|max:100',
            'cta_button_link' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute may not be greater than :max characters.',
        ];
    }
}
