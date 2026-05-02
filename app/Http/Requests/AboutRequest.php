<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            // Section 1: Who We Are
            'who_label' => 'required|string|max:50',
            'who_title' => 'required|string|max:255',
            'who_description_1' => 'required|string|max:1000',
            'who_description_2' => 'nullable|string|max:1000',
            'check1_text' => 'nullable|string|max:100',
            'check2_text' => 'nullable|string|max:100',
            'check3_text' => 'nullable|string|max:100',
            'check4_text' => 'nullable|string|max:100',

            // Section 2: Our Story
            'story_title' => 'required|string|max:255',
            'story_description' => 'required|string|max:2000',
            'story_stat1_value' => 'nullable|string|max:20',
            'story_stat1_label' => 'nullable|string|max:50',
            'story_stat2_value' => 'nullable|string|max:20',
            'story_stat2_label' => 'nullable|string|max:50',
            'story_stat3_value' => 'nullable|string|max:20',
            'story_stat3_label' => 'nullable|string|max:50',

            // Section 3: Mission & Vision
            'mission_section_label' => 'required|string|max:50',
            'mission_label' => 'required|string|max:50',
            'mission_title' => 'required|string|max:100',
            'mission_text' => 'required|string|max:1000',
            'mission_item1' => 'nullable|string|max:255',
            'mission_item2' => 'nullable|string|max:255',
            'mission_item3' => 'nullable|string|max:255',

            'vision_title' => 'required|string|max:100',
            'vision_text' => 'required|string|max:1000',
            'vision_item1' => 'nullable|string|max:255',
            'vision_item2' => 'nullable|string|max:255',
            'vision_item3' => 'nullable|string|max:255',

            // Section 4: Counters (Track Record)
            'stat1_number' => 'required|string|max:20',
            'stat1_suffix' => 'nullable|string|max:5',
            'stat1_text' => 'required|string|max:50',

            'stat2_number' => 'required|string|max:20',
            'stat2_suffix' => 'nullable|string|max:5',
            'stat2_text' => 'required|string|max:50',

            'stat3_number' => 'required|string|max:20',
            'stat3_suffix' => 'nullable|string|max:5',
            'stat3_text' => 'required|string|max:50',

            'stat4_number' => 'required|string|max:20',
            'stat4_suffix' => 'nullable|string|max:5',
            'stat4_text' => 'required|string|max:50',
        ];
    }
}
