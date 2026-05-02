<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeSettingRequest extends FormRequest
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
            // Hero Section
            'hero_badge' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_desc' => 'nullable|string',
            'hero_cta1_text' => 'sometimes|string|max:255',
            'hero_cta1_link' => 'nullable|string|max:255',
            'hero_cta2_text' => 'sometimes|string|max:255',
            'hero_cta2_link' => 'nullable|string|max:255',
            'hero_visual_title' => 'nullable|string|max:255',
            'hero_visual_item1' => 'nullable|string|max:255',
            'hero_visual_item2' => 'nullable|string|max:255',
            'hero_visual_item3' => 'nullable|string|max:255',
            'hero_visual_item4' => 'nullable|string|max:255',

            // Services Section
            'services_label' => 'nullable|string|max:255',
            'services_title' => 'nullable|string|max:255',
            'services_subtitle' => 'nullable|string',

            // Why Us Section
            'whyus_label' => 'sometimes|string|max:255',
            'whyus_title' => 'sometimes|string|max:255',
            'whyus_description' => 'nullable|string',

            // Why Us Features
            'whyus_feature1_icon' => 'sometimes|string|max:255',
            'whyus_feature1_title' => 'sometimes|string|max:255',
            'whyus_feature1_subtitle' => 'nullable|string|max:255',

            'whyus_feature2_icon' => 'sometimes|string|max:255',
            'whyus_feature2_title' => 'sometimes|string|max:255',
            'whyus_feature2_subtitle' => 'nullable|string|max:255',

            'whyus_feature3_icon' => 'sometimes|string|max:255',
            'whyus_feature3_title' => 'sometimes|string|max:255',
            'whyus_feature3_subtitle' => 'nullable|string|max:255',

            // Statistics
            'stat1_value' => 'sometimes|string|max:255',
            'stat1_label' => 'sometimes|string|max:255',
            'stat2_value' => 'sometimes|string|max:255',
            'stat2_label' => 'sometimes|string|max:255',
            'stat3_value' => 'sometimes|string|max:255',
            'stat3_label' => 'sometimes|string|max:255',
            'stat4_value' => 'sometimes|string|max:255',
            'stat4_label' => 'sometimes|string|max:255',

            // Testimonials Section
            'testimonials_label' => 'sometimes|string|max:255',
            'testimonials_title' => 'sometimes|string|max:255',

            // FAQ Section
            'faq_label' => 'sometimes|string|max:255',
            'faq_title' => 'sometimes|string|max:255',

            // CTA Banner
            'cta_title' => 'sometimes|string|max:255',
            'cta_subtitle' => 'nullable|string|max:255',
            'cta_button1_text' => 'sometimes|string|max:255',
            'cta_button1_link' => 'sometimes|string|max:255',
            'cta_button2_text' => 'sometimes|string|max:255',
            'cta_button2_link' => 'sometimes|string|max:255',
        ];
    }
}
